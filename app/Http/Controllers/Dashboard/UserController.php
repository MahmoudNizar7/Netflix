<?php

    namespace App\Http\Controllers\Dashboard;

    use App\Http\Controllers\Controller;
    use App\Models\Role;
    use App\Models\User;
    use Illuminate\Http\Request;

    class UserController extends Controller
    {
        public function __construct()
        {
            $this->middleware('permission:users_read')->only(['index']);
            $this->middleware('permission:users_create')->only(['create', 'store']);
            $this->middleware('permission:users_update')->only(['edit', 'update']);
            $this->middleware('permission:users_delete')->only(['destroy']);
        }

        public function index(Request $request)
        {
            $roles = Role::whereRoleNot('super_admin')->get();

            $users = User::whereRoleNot('super_admin')
                ->whenSearch($request->search)
                ->whenRole(request()->role_id)
                ->with('roles')
                ->paginate(5);
            return view('dashboard.users.index', compact('users', 'roles'));
        }

        public function create()
        {
            //  hello world
            $roles = Role::whereRoleNot(['super_admin', 'admin', 'user'])->get();
            return view('dashboard.users.create', compact('roles'));
        }

        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed',
                'role_id' => 'required|numeric'
            ]);
            $request->merge(['password' => bcrypt($request->password)]);

            $user = User::create($request->all());
            $user->attachRoles(['admin', $request->role_id]);

            alert()->success('Success', 'Data added successfully');
            return redirect()->route('dashboard.users.index');
        }

        public function edit(User $user)
        {
            $roles = Role::whereRoleNot(['super_admin', 'admin', 'user'])->get();
            return view('dashboard.users.edit', compact('user', 'roles'));
        }

        public function update(Request $request, User $user)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'role_id' => 'required|numeric'
            ]);

            $user->update($request->all());
            $user->syncRoles(['admin', $request->role_id]);

            alert()->success('Success', 'Data updated successfully');
            return redirect()->route('dashboard.users.index');
        }

        public function destroy(Request $request)
        {
            User::find($request->id)->delete();

            alert()->success('Success', 'Data deleted successfully');
            return response()->json(['url' => route('dashboard.users.index')]);
        }

    }
