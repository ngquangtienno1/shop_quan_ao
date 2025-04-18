<?php

namespace App\Http\Controllers\Backend;


use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(Request $request)
    {
        $categories = Category::latest()->paginate(10); // 10 danh mục mỗi trang

        return view('admin.categories.index', compact('categories'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        Category::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.show', compact('category'));}
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $category = Category::find($id);

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, $id)
    {
        // dd($category);
        $category = Category::find($id);

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Danh mục đã được xóa thành công!');
    }

    public function bulkDelete(Request $request)
    {
        $categoryIds = json_decode($request->category_ids, true);

        if (empty($categoryIds)) {
            return redirect()->route('categories.index')->with('error', 'Không có danh mục nào được chọn.');
        }

        Category::whereIn('id', $categoryIds)->delete();
        return redirect()->route('categories.index')->with('success', 'Xóa danh mục thành công!');
    }



    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $categories = Category::where('name', 'LIKE', "%$keyword%")
            ->orWhere('description', 'LIKE', "%$keyword%")
            ->paginate(5)
            ->appends(['keyword' => $keyword]);

        return view('admin.categories.index', compact('categories'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
