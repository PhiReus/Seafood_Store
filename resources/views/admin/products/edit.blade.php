@extends('admin.layouts.master')
@section('content')
    @include('sweetalert::alert')
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" style=margin:70px>
        @csrf
        @method('put')
        <div class="form-group">
            <label for="exampleInputEmail1">NAME</label>
            <input type="text" class="form-control" placeholder="name" value="{{ $product->name }}" name="name"
                onkeyup="ChangeToSlug();" id="slug">
            @error('name')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">SLUG</label>
            <input type="text" class="form-control" placeholder="slug" value="{{ $product->slug }}" name="slug"
                name="slug" id="convert_slug">
            @error('slug')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">PRICE</label>
            <input type="text" class="form-control" placeholder="price" value="{{ $product->price }}" name="price">
            @error('price')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">DESCRIPTION</label>
            <textarea name="description" id="description" placeholder="description" class="form-control" rows="5"
                style="resize: none">{{ old('description', $product->description) }}</textarea>

            @error('description')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">QUANTITY</label>
            <input type="text" class="form-control" placeholder="quantity" value="{{ $product->quantity }}"
                name="quantity">
            @error('quantity')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="status">STATUS</label>
            <select name="status" class="form-control">
                <option value="">-- Chọn trạng thái --</option>
                <option value="1" @if ($product->status == 1) selected @endif>Còn hàng</option>
                <option value="0" @if ($product->status == 0) selected @endif>Hết hàng</option>
                <option value="2" @if ($product->status == 2) selected @endif>Đang nhập hàng</option>
            </select>
            @error('status')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">IMAGE</label>
            <input type="file" class="form-control-file" id="inputFile" name="image">
            @error('image')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
            <img src="{{ asset($product->image) ?? asset('public/images/' . old('image', $product->image)) }}"
                width="90px" height="90px" id="blah1" alt="">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">CATEGORIES</label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
    </form>
@endsection
