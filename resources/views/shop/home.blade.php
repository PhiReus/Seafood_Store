@extends('shop.layouts.master')
@section('content')
    @include('sweetalert::alert')

    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Featured
                Products</span></h2>
        <div class="row px-xl-5">
            @foreach ($products as $key => $product)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4 @if ($product->status == 0) out-of-stock @endif">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ asset($product->image) }}" alt="">
                            <div class="product-action">
                                @if ($product->status == 1)
                                    <a class="btn btn-outline-dark btn-square add-to-cart-btn"
                                        data-product-id="{{ $product->id }}" href="#"><i
                                            class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square"
                                        href="{{ url('shop1/show/' . $product->slug) }}"><i class="fa fa-search"></i></a>
                                @else
                                    <div class="out-of-stock-label">
                                        <p style="color: red;">Hết hàng</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">{{ $product->name }}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>{{ str_replace(',', '.', number_format(floatval($product->price))) . ' VND' }}</h5>
                            </div>
                            <div class="text-center py-0">
                                @if ($product->status == 1)
                                    <h6>Còn hàng</h6>
                                @elseif ($product->status == 0)
                                    <h6>Hết hàng</h6>
                                @elseif ($product->status == 2)
                                    <h6>Đang nhập hàng</h6>
                                @endif
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <style>
        .product.out-of-stock {
            opacity: 0.5;
            /* đặt độ mờ của sản phẩm */
            pointer-events: none;
            /* vô hiệu hóa các sự kiện của chuột */
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.add-to-cart-btn').on('click', function(e) {
                e.preventDefault();
                var productId = $(this).data('product-id');
                // Gửi yêu cầu Ajax để thêm sản phẩm vào giỏ hàng
                $.ajax({
                    url: '{{ route('shop.store', ['id' => ':id']) }}'.replace(':id',
                        productId), // Đường dẫn tới route xử lý thêm sản phẩm vào giỏ hàng
                    method: 'GET',
                    success: function(response) {
                        // Cập nhật giỏ hàng trên giao diện người dùng
                        $('.cart-quantity').text(response.cartQuantity);
                        alert('Thêm vào giỏ hàng thành công');
                    },
                    error: function(xhr) {
                        alert('Đã xảy ra lổi, vui lòng thử lại');
                    }
                });
            });
        });
    </script>
@endsection
