@extends('admin.layouts.master')
@section('content')
@include('sweetalert::alert')
<!-- <style>
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .pagination li {
        margin: 0 5px;
        display: inline-block;
    }

    .pagination a {
        color: #333;
        text-decoration: none;
        padding: 5px 10px;
        border: 1px solid #ccc;
    }

    .pagination a.active {
        background-color: #333;
        color: #fff;
    }
</style> -->
<!-- <h1 class="offset-4">Danh sách caau thu</h1> -->
<main class="page-content">
    <div class="container">
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Thêm mới</a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class = 'w-5'>ID</th>
                    <th scope="col">NAME</th>
                    <th adta-breakpoints="xs">Quản lí</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key => $category)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $category->name }}</td>
                    <td>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Chuyễn vào thùng rác')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- {{ $categories->appends(request()->query())->links('pagination::bootstrap-4') }} -->
    </div>
</main>
@endsection
