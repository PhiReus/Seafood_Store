<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreRegisterRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ShopController extends Controller
{
    public function index()
    {
        // $products = Product::where('status', 1)->get();
        $products = Product::all();

        $param = [
            'products' => $products
        ];
        return view('shop.home', $param);
    }
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();

        $category = Category::get();
        $param = [
            'product' => $product,
            'category' => $category
        ];
        return view('shop.detail', $param);
    }
    public function store($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'image' => $product->image,
                'max' => $product->quantity
            ];
        }

        session()->put('cart', $cart);

        $cartQuantity = count($cart);

        return response()->json(['cartQuantity' => $cartQuantity]);
    }
    public function cart()
    {
        $cart = session()->get('cart', []);
        $param = [
            'cart' => $cart,
        ];

        return view('shop.cart', $param);
    }

    public function update(Request $request)
    {
        if ($request->id and $request->quantity) {

            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            alert()->success('Cập Nhật Đơn Hàng Thành Công!');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            alert()->success('Xóa Đơn Hàng Thành Công!');
        }
    }


    public function checkOuts()
    {
        return view('shop.checkout');
    }
    public function Order(Request $request)
    {
        if ($request->product_id == null) {
            return redirect()->back();
        } else {
            $id = Auth::guard('customers')->user()->id;
            $data = Customer::find($id);
            $data->address = $request->address;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->address = $request->address;

            if (isset($request->note)) {
                $data->note = $request->note;
            }
            $data->save();

            $order = new Order();
            $order->customer_id = Auth::guard('customers')->user()->id;
            $order->order_date = date('Y-m-d H:i:s');

            $order->save();
        }
        $count_product = count($request->product_id);
        for ($i = 0; $i < $count_product; $i++) {
            $orderItem = new OrderDetail();
            $orderItem->order_id =  $order->id;
            $orderItem->product_id = $request->product_id[$i];
            $orderItem->quantity = $request->quantity[$i];
            $orderItem->total = $request->total[$i];


            $orderItem->save();

            // Update the product quantity in the database
            $product = Product::find($orderItem->product_id);
            $product->quantity -= $orderItem->quantity;

            if ($product->quantity == 0) {
                $product->status = 0;
            }
            $product->save();
        }

        // Clear the cart session
        session()->forget('cart');

        alert()->success('Đặt hàng thành công!');

        return redirect()->route('shop.index');
    }

    public function register()
    {
        return view('shop.register');
    }
    public function checkregister(StoreRegisterRequest $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:customers|email',
            'password' => 'required|min:6',
        ]);

        $notifications = [
            'ok' => 'ok',
        ];
        $notification = [
            'message' => 'error',
        ];
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address =  $request->address;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);

        if ($request->password == $request->confirmpassword) {
            alert()->success('Đăng ký tài khoản thành công!');
            $customer->save();

            return redirect()->route('shop.index');
        } else {
            return redirect()->route('shop.index')->with($notification);
        }
    }

    public function login()
    {
        return view('shop.login');
    }
    public function checklogin(Request $request)
    {
        // dd(1);
        $notification = [
            'message' => 'error',
        ];
        $arr = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::guard('customers')->attempt($arr)) {
            alert()->success('Đăng nhập trang shop thành công!');
            return redirect()->route('shop.index');
        } else {
            alert()->error('Tài khoản hoặc mật khẩu không đúng,
           Vui lòng đăng nhập lại!');
            return redirect()->route('shop.index');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('shop.index');
    }
}
