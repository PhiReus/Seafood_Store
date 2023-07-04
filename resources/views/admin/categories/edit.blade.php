@extends('admin.layouts.master')
@section('content')
@include('sweetalert::alert')
<form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="exampleInputEmail1">NAME</label>
        <input type="text" class="form-control" placeholder="name" value="{{ $category->name }}" name="name">
        @error('name')
        <div class="text text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
</form>
@endsection
