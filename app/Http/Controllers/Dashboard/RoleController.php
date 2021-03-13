<?php

    namespace App\Http\Controllers\Dashboard;

    use App\Http\Controllers\Controller;
    use App\Models\Role;
    use Illuminate\Http\Request;

    class RoleController extends Controller
    {
        public function __construct()
        {
            $this->middleware('permission:roles_read')->only(['index']);
            $this->middleware('permission:roles_create')->only(['create', 'store']);
            $this->middleware('permission:roles_update')->only(['edit', 'update']);
            $this->middleware('permission:roles_delete')->only(['destroy']);
        }

        public function index()
        {
            $roles = Role::whereRoleNot(['super_admin','admin','user'])->whenSearch(request()->search)
                ->with('permissions')
                ->withCount('users')
                ->paginate(5);
            return view('dashboard.roles.index', compact('roles'));
        }

        public function create()
        {
            return view('dashboard.roles.create');
        }

        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|unique:roles,name',
                'permissions' => 'required|array|min:1'
            ]);

            $role = Role::create($request->all());
            $role->attachPermissions($request->permissions);

            alert()->success('Success', 'Data added successfully');
            return redirect()->route('dashboard.roles.index');
        }

        public function edit(Role $role)
        {
            return view('dashboard.roles.edit', compact('role'));
        }

        public function update(Request $request, Role $role)
        {
            $request->validate([
                'name' => 'required|unique:roles,name,' . $role->id,
                'permissions' => 'required|array|min:1'
            ]);

            $role->update($request->all());
            $role->syncPermissions($request->permissions);

            alert()->success('Success', 'Data updated successfully');
            return redirect()->route('dashboard.roles.index');
        }

        public function destroy(Request $request)
        {
            Role::find($request->id)->delete();

            alert()->success('Success', 'Data deleted successfully');
            return response()->json(['url' => route('dashboard.roles.index')]);
        }
    }
