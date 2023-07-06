<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create',Category::class);
        $categories = Category::get();
        $param = [
            'categories' => $categories
        ];
        return view('admin.categories.create', $param);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:products', // Thêm quy tắc kiểm tra unique vào trường 'name' của bảng 'players'
        ], [
            'name.required' => 'Vui lòng điền đầy đủ thông tin!',

        ]);
        $categories = new Category();
        $categories->name = $request->name;
        alert()->success('Thêm loại sản phẩm thành công!');
        $categories->save();
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        $this->authorize('update',$category);

        $param = [
            'category' => $category
        ];
        return view('admin.categories.edit', $param);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Vui lòng điền đầy đủ thông tin!',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        alert()->success('Cập nhật loại sản phẩm thành công!');
        $category->save();
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $this->authorize('delete',$category);
        $category->delete();
        alert()->success('Xóa loại sản phẩm thành công');
        return redirect()->route('categories.index');
    }
}
