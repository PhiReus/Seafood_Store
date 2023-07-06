@extends('admin.layouts.master')
@section('content')
    <div class="pagetitle text-center">
        <h1><strong><em>Chi tiết đơn hàng </em></strong></h1>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col"><strong>ID</strong></th>
                <th scope="col"><strong>PRODUCT NAME</strong></th>
                <th scope="col"><strong>IMAGE</strong></th>
                <th scope="col"><strong>PRICE</strong></th>
                <th scope="col"><strong>QUANTITY</strong></th>
                <th scope="col"><strong>TOTAL</strong></th>
            </tr>
        </thead>
        <tbody>
            @php $grandTotal = 0 @endphp
            @foreach ($items->groupBy('order_date') as $group)
                @php $total = 0 @endphp
                <tr>
                    <td colspan="6" class="text-center"><strong><em>{{ $group->first()->order_date }}</em></strong></td>
                </tr>
                @foreach ($group as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td><img width="90px" height="90px" src="{{ asset($item->image) }}" alt=""></td>
                        <td>{{ str_replace(',', '.', number_format(floatval($item->price))) . ' VND' }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ str_replace(',', '.', number_format(floatval($item->total))) . ' VND' }}</td>
                        {{-- <td>{{ $item->order_date }}</td> --}}
                    </tr>
                    @php
                        $total += $item->total;
                        $grandTotal += $item->total;
                    @endphp
                @endforeach
                <tr>
                    <td colspan="5" class="text-right"><strong>Total:</strong></td>
                    <td><strong>{{ str_replace(',', '.', number_format(floatval($total))) . ' VND' }}</strong></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h4><strong>Tổng tiền của tất cả đơn hàng: {{ str_replace(',', '.', number_format(floatval($grandTotal))) . ' VND' }}<strong></h4> .<br>
    <button class="btn btn-dark" onclick="window.history.back()">
        <i class="fa fa-arrow-left mr-2"></i> Back
    </button>
    {{-- <div class="card-footer">
        <nav class="float-right">
            {{ $ordertail->links() }}
        </nav>
    </div> --}}
@endsection
