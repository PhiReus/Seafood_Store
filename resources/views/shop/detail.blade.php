@extends('shop.layouts.master')

@section('content')
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <img class="w-100 h-100" src="{{ asset($product->image) }}" alt="Image">
            </div>
            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">Tên sản phẩm: {{ $product['name'] }}</h3><br>

                <h3 class="font-weight-semi-bold mb-4">Giá tiền: {{str_replace(',', '.', number_format(floatval($product->price))).' VND'}}</h3><br>

                <h3 class="mb-4">
                    Mô tả:<h5>{!! $product['description'] !!}</h5>

                </h3>

                <div class="d-flex align-items-center mb-4 pt-2">
                    <a class="btn btn-success" href="{{ route('shop.store', $product->id) }}" id="{{ $product->id }}">
                        <i class="fa fa-shopping-cart mr-2"></i> Thêm vào giỏ hàng
                    </a>
                    <button class="btn btn-dark" onclick="window.history.back()">
                        <i class="fa fa-arrow-left mr-2"></i> Quay lại
                    </button>
                </div>
            </div>
        </div>
    </div>
    <style>
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .btn-outline-secondary {
            color: #6c757d;
            border-color: #6c757d;
        }

        .btn-outline-secondary:hover {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d;
        }
    </style>
@endsection

