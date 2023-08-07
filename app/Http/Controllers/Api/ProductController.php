<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    protected $productService;

    public function index(){
        $products = Product::all();
        return ProductResource::collection($products);
        // return response()->json($products);
    }
    public function detail($id)
    {
        $product = Product::with('category')->find($id);
        return response()->json($product, 200);
    }
    public function category_list()
    {
        $categories = Category::with('products')->take(10)->get();
        return response()->json($categories, 200);
    }
    public function product_new()
    {
        $product = Product::take(6)->get();
        return response()->json($product, 200);
    }
}
