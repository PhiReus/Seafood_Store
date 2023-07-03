@extends('admin.layouts.master')
@section('content')
@include('sweetalert::alert')
<form action="{{ route('orders.update', $order->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="exampleInputEmail1">ORDER DATE</label>
        <input type="date" class="form-control" placeholder="order date" value="{{ $order->order_date }}" name="order_date">
        @error('order_date')
        <div class="text text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">DELIVERY DATE</label>
        <input type="date" class="form-control" placeholder="delivery date" value="{{ $order->delivery_date }}" name="delivery_date">
        @error('delivery_date')
        <div class="text text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">PRODUCT</label>
        <select name="product_id" class="form-control">
            @foreach ($products as $product)
            <option value="{{ $product->id }}" {{ $product->id == $order->product_id ? 'selected' : '' }}>
                {{ $product->name }}
            </option>
            @endforeach
        </select>
        @error('product_id')
        <div class="text text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">QUANTITY</label>
        <input type="text" class="form-control" placeholder="quantity" value="{{ $order->quantity }}" name="quantity">
        @error('quantity')
        <div class="text text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">TOTAL</label>
        <input type="text" class="form-control" placeholder="total amount" value="{{ $order->total_amount }}" name="total_amount">
        @error('total_amount')
        <div class="text text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">CUSTOMER</label>
        <select name="customer_id" class="form-control">
            @foreach ($customers as $customer)
            <option value="{{ $customer->id }}" {{ $customer->id == $order->customer_id ? 'selected' : '' }}>
                {{ $customer->name }}
            </option>
            @endforeach
        </select>
        @error('customer_id')
        <div class="text text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('orders.index') }}" class="btn btn-primary">Quay lại</a>
</form>
@endsection
