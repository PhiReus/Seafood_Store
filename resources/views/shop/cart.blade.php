@extends('shop.layouts.master')
@section('content')
    @include('sweetalert::alert')

    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                            <th>Tùy chọn</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @php
                            $total = 0;
                            $totalAll = 0;
                        @endphp
                        @if ($cart)
                            @foreach ($cart as $id => $details)
                                @php
                                    $total = $details['price'] * $details['quantity'];
                                    $totalAll += $total;
                                @endphp
                                <tr>
                                    <td class="align-middle">
                                        <img src="{{ asset('public/uploads/product/' . $details['image']) }}" alt=""
                                            style="width: 50px;"><a>{{ $details['name'] ?? '' }}</a>
                                    </td>
                                    <td class="align-middle">{{ number_format($details['price']) }} VNĐ</td>

                                    <td class="align-middle">
                                        <input type="number" value="{{ $details['quantity'] }}"
                                            class="form-control quantity" min="1" max="{{ $details['max'] }}" />
                                        <script>
                                            // Lấy giá trị số lượng hàng từ trang web
                                            var stockQuantity = parseInt("{{ $details['max'] }}");

                                            // Lấy trường nhập số lượng sản phẩm
                                            var quantityInput = document.querySelector('.quantity');

                                            // Thêm trình lắng nghe sự kiện cho trường nhập số lượng
                                            quantityInput.addEventListener('change', function() {
                                                // Lấy giá trị số lượng khách hàng muốn đặt hàng
                                                var quantity = parseInt(this.value);

                                                // Nếu số lượng vượt quá số lượng trong kho, giới hạn số lượng cho phù hợp
                                                if (quantity > stockQuantity) {
                                                    this.value = stockQuantity;
                                                }
                                            });
                                        </script>
                                    </td>

                                    <td class="align-middle"> {{ number_format($total) }} VNĐ </td>
                                    <td class="actions" data-th="">
                                        <button class="btn btn-outline-info btn-sm update-cart" data-id="{{ $id }}">
                                            <i class="fa fa-solid fa-recycle"></i>
                                        </button>
                                        <button class="btn btn-outline-danger btn-sm remove-from-cart"
                                            data-id="{{ $id }}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                    </tbody>
                    @endforeach
                    @endif
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="">
                        <div class="input-group-append">
                            {{-- <button class="btn btn-primary"></button> --}}
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Tóm tắt giỏ
                        hàng</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Tổng</h6>
                            <h6>{{ number_format($totalAll) }} VNĐ</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Phí vận chuyển</h6>
                            <h6 class="font-weight-medium">15.000VNĐ</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Tổng thu</h5>
                            <h5>{{ number_format($totalAll + 15000) }} VNĐ </h5>
                            @if ('cart')
                                <a href="{{ route('checkOuts') }}" class="btn btn btn-outline-warning pull-right"
                                    onclick="return checkQuantity()">Thanh toán</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endsection
        @section('scripts')
            <script type="text/javascript">
                $(".update-cart").click(function(e) {
                    e.preventDefault();
                    var ele = $(this);
                    $.ajax({
                        url: '{{ url('shop1/update-cart') }}',
                        method: "patch",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: ele.attr("data-id"),
                            quantity: ele.parents("tr").find(".quantity").val()
                        },
                        success: function(response) {
                            window.location.reload();
                        }
                    });
                });
                $(".remove-from-cart").click(function(e) {
                    e.preventDefault();
                    var ele = $(this);
                    if (confirm("Bạn có muốn xóa?")) {
                        $.ajax({
                            url: '{{ url('shop1/remove-from-cart') }}',
                            method: "DELETE",
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: ele.attr("data-id")
                            },
                            success: function(response) {
                                window.location.reload();
                            }
                        });
                    }
                });
            </script>
        @endsection
