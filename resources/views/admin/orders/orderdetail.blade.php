@extends('admin.layouts.master')
@section('content')
    <div class="pagetitle text-center">
        <h1><strong><em>Chi tiết đơn hàng</em></strong></h1>
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
                {{-- <th scope="col">ORDER DATE</th> --}}
            </tr>
        </thead>
        <tbody>
            @php $grandTotal = 0 @endphp
            @foreach ($items->groupBy('order_date') as $group)
                @php $total = 0 @endphp
                <tr>
                    {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                    <td colspan="6" class="text-center"><strong><em>{{ $group->first()->order_date }}</em></strong></td>
                </tr>
                @foreach ($group as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td><img width="90px" height="90px" src="{{ asset($item->image) }}" alt=""></td>
                        <td>{{ number_format($item->price) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->total) }}</td>
                        {{-- <td>{{ $item->order_date }}</td> --}}
                    </tr>
                    @php
                        $total += $item->total;
                        $grandTotal += $item->total;
                    @endphp
                @endforeach
                <tr>
                    <td colspan="5" class="text-right"><strong>Total:</strong></td>
                    <td><strong>{{ number_format($total) }}</strong></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h4><strong>Tổng tiền của tất cả đơn hàng: {{ number_format($grandTotal) }} VND<strong></h4> .<br>
    <button class="btn btn-dark" onclick="window.history.back()">
        <i class="fa fa-arrow-left mr-2"></i> Back
    </button>
    {{-- <div class="card-footer">
        <nav class="float-right">
            {{ $ordertail->links() }}
        </nav>
    </div> --}}
@endsection
