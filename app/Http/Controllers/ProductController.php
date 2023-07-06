<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StroreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(5);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Product::class);
        $categories = Category::get();
        $param = [
            'categories' => $categories
        ];
        return view('admin.products.create', $param);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StroreProductRequest $request)
    {
        $products = new Product();
        $products->name = $request->name;
        $products->slug = $request->slug;
        $products->price = $request->price;
        $products->description = $request->description;
        $products->quantity = $request->quantity;
        $products->status = $request->status;
        // $products->category_id = $request->category_id;
        $fieldName = 'image';
        if ($request->hasFile($fieldName)) {
            $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
            $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
            $extenshion = $request->file($fieldName)->getClientOriginalExtension();
            $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extenshion;
            $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
            $path = str_replace('public/', '', $path);
            $products->image = $path;
        }
        $products->category_id = $request->category_id;
        alert()->success('Thêm sản phẩm thành công!');
        $products->save();
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $productshow = Product::findOrFail($id);
        $param = [
            'productshow' => $productshow,
        ];
        return view('admin.products.show', $param);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $this->authorize('update', $product);
        $categories = Category::all();
        $param = [
            'product' => $product,
            'categories' => $categories
        ];
        return view('admin.products.edit', $param);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->status = $request->status;
        $fieldName = 'image';
        if ($request->hasFile($fieldName)) {
            $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
            $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
            $extenshion = $request->file($fieldName)->getClientOriginalExtension();
            $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extenshion;
            $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
            $path = str_replace('public/', '', $path);
            $product->image = $path;
        }
        $product->category_id = $request->category_id;
        alert()->success('Cập nhật sản phẩm thành công!');
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $this->authorize('delete', $product);
        $product->delete();
        alert()->success('Sản phẩm đã chuyễn vào thùng rác');
        return redirect()->route('products.index');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        if (!$search) {
            return redirect()->route('product.index');
        }
        $products = Product::where('name', 'LIKE', '%' . $search . '%')->paginate(2);
        return view('admin.products.index', compact('products'));
    }

    public function trash()
    {
        $softs = Product::onlyTrashed()->get();
        return view('admin.products.trash', compact('softs'));
    }
    public function restore($id)
    {
        try {
            $softs = Product::withTrashed()->find($id);
            $softs->restore();
            alert()->success('Khôi Phục Sản Phẩm Thành Công!');
            return redirect()->route('products.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('Có Lỗi Xảy Ra!', 'error', 'top-right');
            return redirect()->route('products.index');
        }
    }
    //xóa vĩnh viễn
    public function deleteforever($id)
    {
        try {
            $softs = Product::withTrashed()->find($id);
            $softs->forceDelete();
            alert()->success('Xóa Vĩnh Viễn Thành Công!');
            return redirect()->route('products.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('Có Lỗi Xảy Ra!', 'error', 'top-right');
            return redirect()->route('products.index');
        }
    }
    public function exportProduct()
    {
        return Excel::download(new ProductExport(), 'products.xlsx');
    }
}
