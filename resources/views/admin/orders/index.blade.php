@extends('admin.layouts.master')
@section('content')
    @include('sweetalert::alert')

    <main class="page-content">
        <div class="container">
            <a href="{{ route('orders.export') }}" class="btn btn-success">Export to Excel</a>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">CUSTOMER NAME</th>
                        <th scope="col">ADDRESS</th>
                        <th scope="col">PHONE</th>
                        {{-- <th scope="col">ORDER DATE</th> --}}
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $processedEmails = []; // Mảng lưu trữ các email đã xử lý
                    @endphp

                    @foreach ($items as $key => $item)
                        @if (!in_array($item->customer->email, $processedEmails))
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $item->customer->name }}</td>
                            <td>{{ $item->customer->address }}</td>
                            <td>{{ $item->customer->phone }}</td>
                            {{-- <td>{{ $item->order_date }}</td> --}}
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
                        @php
                            $processedEmails[] = $item->customer->email; // Thêm email đã xử lý vào mảng
                        @endphp
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <nav class="float-right">
                {{ $items->links() }}
            </nav>
        </div>
    </main>
@endsection
