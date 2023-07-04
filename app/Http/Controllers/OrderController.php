<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Orderdetail;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    public function index()
    {
        $items = Order::orderBy('order_date', 'desc')->paginate(8);
        return view('admin.orders.index', compact('items'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->select('orders.*', 'customers.name', 'customers.phone', 'orders.order_date')
            ->where('orders.id', '=', $id)
            ->first();

        $items = DB::table('orderdetail')
            ->join('orders', 'orderdetail.order_id', '=', 'orders.id')
            ->join('products', 'orderdetail.product_id', '=', 'products.id')
            ->select('products.*', 'orderdetail.*', 'orders.order_date')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->where('customers.name', '=', $order->name)
            ->where('customers.phone', '=', $order->phone)
            ->get();

        return view('admin.orders.orderdetail', compact('items', 'order'));
    }








    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::find($id);
        $param = [
            'order' => $order,
        ];
        return view('admin.orders.edit', $param);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);
        $order->delete();
        alert()->success('Xóa đơn hàng thành công');
        return redirect()->route('orders.index');
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        if (!$search) {
            return redirect()->route('product.index');
        }
        $items = Order::join('customers', 'orders.customer_id', '=', 'customers.id')
            ->where('name', 'LIKE', '%' . $search . '%')
            ->get();
        // dd($items);
        return view('admin.orders.index', compact('items'));
    }
    public function exportOrder()
    {
        return Excel::download(new OrderExport(), 'orders.xlsx');
    }
}
