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
        <a href="{{ route('customers.create') }}" class="btn btn-primary">Thêm mới</a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">PHONE</th>
                    <th scope="col">ADDRESS</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">IMAGE</th>
                    <th adta-breakpoints="xs">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $key => $customer)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->email }}</td>
                    <td><img width="90px" height="90px" src="{{ asset($customer->image) }}" alt=""></td>
                    <td>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Chuyễn vào thùng rác')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- {{ $customers->appends(request()->query())->links('pagination::bootstrap-4') }} -->
    </div>
</main>
@endsection
