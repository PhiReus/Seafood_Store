@extends('admin.layouts.master')
@section('content')
    @include('sweetalert::alert')

    <main class="page-content">
        <div class="container">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">CUSTOMER NAME</th>
                        <th scope="col">ADDRESS</th>
                        <th scope="col">PHONE</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $key => $item)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $item->customer->name }}</td>
                            <td>{{ $item->customer->address }}</td>
                            <td>{{ $item->customer->phone }}</td>
                            <td>
                                <form action="{{ route('orders.destroy', $item->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{ route('orders.orderdetail', $item->id) }}"
                                        class="btn btn-info btn-sm">See</a>
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Bạn muốn xóa sản phẩm')">Delete</button>
                                </form>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                <nav class="float-right">
                    {{ $items->links() }}
                </nav>
            </div>
        </div>
    </main>
@endsection
