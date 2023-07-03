@extends('admin.layouts.master')
@section('content')
@include('sweetalert::alert')
<form action="{{ route('customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="exampleInputEmail1">NAME</label>
        <input type="text" class="form-control" placeholder="name" value="{{ $customer->name }}" name="name">
        @error('name')
        <div class="text text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">PHONE</label>
        <input type="text" class="form-control" placeholder="phone" value="{{ $customer->phone }}" name="phone">
        @error('phone')
        <div class="text text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">ADDRESS</label>
        <input type="text" class="form-control" placeholder="address" value="{{ $customer->address }}" name="address">
        @error('address')
        <div class="text text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">EMAIL</label>
        <input type="email" class="form-control" placeholder="email" value="{{ $customer->email }}" name="email">
        @error('email')
        <div class="text text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">IMAGE</label>
        <input type="file" class="form-control-file" id="inputFile" name="image">
        <!-- @error('image')
        <div class="text text-danger">{{ $message }}</div>
        @enderror -->
        <img src="{{ asset($customer->image) ?? asset('public/images/' . old('image', $customer->image)) }}" width="90px" height="90px" id="blah1" alt="">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('customers.index') }}" class="btn btn-primary">Quay lại</a>
</form>
@endsection
