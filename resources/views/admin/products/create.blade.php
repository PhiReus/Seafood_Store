@extends('admin.layouts.master')
@section('content')
@include('sweetalert::alert')
    <!DOCTYPE html>
    <html>
    <head>
        <title></title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="inputEmail3">NAME</label>
                            <input type="text" class="form-control" name="name" onkeyup="ChangeToSlug();"
                                id="slug">
                            @error('name')
                                <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3">SLUG</label>
                            <input type="text" class="form-control" name="slug" id="convert_slug">
                            @error('slug')
                                <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3">PRICE</label>
                            <input type="text" class="form-control" name="price">
                            @error('price')
                                <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3">DESCRIPTION</label>
                            <textarea name="description" id="description" class="form-control" rows="5" style="resize: none"></textarea>
                            @error('description')
                                <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3">QUANTITY</label>
                            <input type="text" class="form-control" name="quantity">
                            @error('quantity')
                                <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">STATUS</label>
                            <select name="status" class="form-control">
                                <option value="">-- Chọn trạng thái --</option>
                                <option value="1" @if (old('status') == 1) selected @endif>Còn hàng</option>
                                <option value="0" @if (old('status') == 0) selected @endif>Hết hàng</option>
                                <option value="2" @if (old('status') == 2) selected @endif>Đang nhập hàng
                                </option>
                            </select>
                            @error('status')
                                <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3">IMAGE</label>
                            <input type="file" class="form-control" name="image">
                            @error('image')
                                <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3">CATEGORIES</label>
                            <select name="category_id" id="" class="form-control">
                                <option value="">--Vui lòng chọn--</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Sign in</button>
                            <a href="{{ route('products.index') }}" class="btn btn-info btn-sm">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
    </body>

    </html>
@endsection
