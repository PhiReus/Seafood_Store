<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;



class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(6);
        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::get();
        $param = [
            'customers' => $customers
        ];
        return view('admin.customers.create', $param);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:customers', // Thêm quy tắc kiểm tra unique vào trường 'name' của bảng 'players'
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
            'image' => 'required',
        ], [
            'name.required' => 'Vui lòng điền đầy đủ thông tin!',
            'phone.unique' => 'Sản phẩm đã tồn tại.',
            'address.required' => 'Vui lòng điền đầy đủ thông tin!',
            'email.required' => 'Vui lòng điền đầy đủ thông tin!',
            'image.required' => 'Vui lòng điền đầy đủ thông tin!',
        ]);
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $fieldName = 'image';
        if ($request->hasFile($fieldName)) {
            $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
            $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
            $extenshion = $request->file($fieldName)->getClientOriginalExtension();
            $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extenshion;
            $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
            $path = str_replace('public/', '', $path);
            $customer->image = $path;
        }
        alert()->success('Thêm sản phẩm thành công!');
        $customer->save();
        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customershow = Customer::findOrFail($id);
        $param = [
            'customershow' => $customershow,
        ];
        return view('admin.customers.show', $param);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::find($id);
        $param = [
            'customer' => $customer
        ];
        return view('admin.customers.edit', $param);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
            'image' => 'required',
        ], [
            'name.required' => 'Vui lòng điền đầy đủ thông tin!',
            'phone.unique' => 'Sản phẩm đã tồn tại.',
            'address.required' => 'Vui lòng điền đầy đủ thông tin!',
            'email.required' => 'Vui lòng điền đầy đủ thông tin!',
            'image.required' => 'Vui lòng điền đầy đủ thông tin!',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $fieldName = 'image';
        if ($request->hasFile($fieldName)) {
            $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
            $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
            $extenshion = $request->file($fieldName)->getClientOriginalExtension();
            $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extenshion;
            $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
            $path = str_replace('public/', '', $path);
            $customer->image = $path;
        }
        alert()->success('Cập nhật sản phẩm thành công!');
        $customer->save();
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        alert()->success('Sản phẩm đã chuyễn vào thùng rác');
        return redirect()->route('products.index');
    }
}
