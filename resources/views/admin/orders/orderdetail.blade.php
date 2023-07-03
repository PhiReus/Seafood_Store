@extends('admin.layouts.master')
@section('content')
    <div class="pagetitle">
        <h1>Chi tiết đơn hàng</h1>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">PRODUCT NAME</th>
                <th scope="col">IMAGE</th>
                <th scope="col">PRICE</th>
                <th scope="col">QUANTITY</th>
                <th scope="col">TOTAL</th>
                <th scope="col">ORDER DATE</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @foreach ($items as $key => $item)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $item->name }}</td>
                    <td><img width="90px" height="90px" src="{{ asset($item->image) }}" alt=""></td>
                    <td>{{ number_format($item->price) }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->total) }}</td>
                    <td>{{ $order->order_date }}</td>
                </tr>
                @php $total += $item->total @endphp
            @endforeach
        </tbody>
    </table>
    <h4>Tổng Tiền của đơn hàng: {{ number_format($total) }} $</h4> .<br>
    <button class="btn btn-dark" onclick="window.history.back()">
        <i class="fa fa-arrow-left mr-2"></i> Quay lại
    </button>
    {{-- <div class="card-footer">
        <nav class="float-right">
            {{ $ordertail->links() }}
        </nav>
    </div> --}}
@endsection
