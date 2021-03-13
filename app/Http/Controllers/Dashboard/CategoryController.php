<?php

    namespace App\Http\Controllers\Dashboard;

    use App\Http\Controllers\Controller;
    use App\Models\Category;
    use Illuminate\Http\Request;

    class CategoryController extends Controller
    {
        public function __construct()
        {
            $this->middleware('permission:categories_read')->only(['index']);
            $this->middleware('permission:categories_create')->only(['create', 'store']);
            $this->middleware('permission:categories_update')->only(['edit', 'update']);
            $this->middleware('permission:categories_delete')->only(['destroy']);
        }

        public function index()
        {
            $categories = Category::whenSearch(request()->search)->paginate(5);
            return view('dashboard.categories.index', compact('categories'));
        }

        public function create()
        {
            return view('dashboard.categories.create');
        }

        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|unique:categories,name'
            ]);

            Category::create($request->all());

            alert()->success('Success', 'Data added successfully');
            return redirect()->route('dashboard.categories.index');

        }

        public function edit(Category $category)
        {
            return view('dashboard.categories.edit', compact('category'));
        }

        public function update(Request $request, Category $category)
        {
            $request->validate([
                'name' => 'required|unique:categories,name,' . $category->id
            ]);

            $category->update($request->all());

            alert()->success('Success', 'Data updated successfully');
            return redirect()->route('dashboard.categories.index');

        }

        public function destroy(Request $request)
        {
            Category::find($request->id)->delete();

            alert()->success('Success', 'Data deleted successfully');
            return response()->json(['url' => route('dashboard.categories.index')]);
        }
    }
