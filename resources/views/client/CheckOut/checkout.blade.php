@extends('layouts.client')



@section('content')
    {{-- <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form đặt hàng</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <div class="row">
            <div class="col-md-5">
                <form action="{{ route('checkout.checkout') }}" method="post" class="form" role="form">

                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Họ và tên</label>
                            <input type="text" name="order_name" class="form-control" id=""
                                placeholder="Email ..." value="{{ auth()->user()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="order_email" class="form-control" id=""
                                placeholder="Email ..." value="{{ auth()->user()->email }}">
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input type="text" name="order_address" class="form-control" id=""
                                placeholder="Địa chỉ ..." value="{{ auth()->user()->address }}">
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input type="text" name="order_phone" class="form-control" id=""
                                placeholder="Số điện thoại ..." value="{{ auth()->user()->phone }}">
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Đặt hàng</button>
                            @csrf
                        </div>
                </form>
                <div class="">
                    <p class="title text-center fs-3">Phương thức thanh toán</p>
                    <div class="row flex-column justify-content-between">
                        <div class="form-check mt-3">
                            <input class="form-check-input" id="check2" type="radio" value="0" name="check" />
                            <label class="form-check-label">
                                Thanh toán khi nhận hàng
                            </label>
                        </div>
                        <div class="form-check mt-3">
                            <input class="form-check-input" id="check1" type="radio" value="1" name="check" />
                            <label class="form-check-label">
                                Chuyển Khoản
                            </label>
                        </div>
                        <div class="form-check mt-3">
                            <input class="form-check-input" id="check1" type="radio" value="2" name="check" />
                            <label class="form-check-label">
                                Thanh toán Momo
                            </label>
                        </div>


                    </div>

                </div>
            </div>
            <div class="col-md-7">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="5%">STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Giá sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stt = 0;
                        $t = 0;
                        ?>
                        @foreach ($cart->items as $key => $value)
                            <tr>
                                <td>{{ $stt += 1 }}</td>
                                <td>{{ $value['product_name'] }}</td>
                                <td><img src="{{ $value['product_image'] }}" alt=""
                                        style="width:120px;height: 120px;"></td>
                                <td>{{ number_format($value['product_price'], 0, '', ',') }}đ</td>
                                <td>{{ $value['product_quantity'] }}

                                </td>
                                <td>{{ number_format($value['product_price'] * $value['product_quantity'], 0, '', ',') }}đ
                                </td>

                            </tr>
                        @endforeach
                        <tr>
                            <td>Tổng tiền</td>
                            <td>{{ number_format($cart->total_price, 0, '', ',') }} đ</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div> --}}
    <div class="container  py-4">

        <div class="row d-flex justify-content-between">
            <div class="col-md-5">
                <h2 class="py-4">Thông tin khách hàng</h2>
                <form action="{{ route('checkout.checkout') }}" method="post" class="form" role="form">
                    <table class="w-100">
                        <tr class="form-group">
                            <td>Họ tên</td>
                            <td><input type="text" name="order_name" class="form-control" placeholder="Họ tên ..."
                                    value="{{ auth()->user()->name }}"></td>
                        </tr>
                        <tr class="form-group">
                            <td>Email</td>
                            <td><input type="email" name="order_email" class="form-control" placeholder="Email..."
                                    value="{{ auth()->user()->email }}"></td>
                        </tr>
                        <tr class="form-group">
                            <td>Số điện thoại</td>
                            <td><input type="text" name="order_phone" class="form-control"
                                    placeholder="Số điện thoại ..." value="{{ auth()->user()->phone }}"></td>
                        </tr>
                        <tr class="form-group">
                            <td>Địa chỉ</td>
                            <td><input type="text" name="order_address" class="form-control" placeholder="Địa chỉ ..."
                                    value="{{ auth()->user()->address }}"></td>
                        </tr>


                        <tr>
                            <td>
                                <button type="submit" class="btn btn-primary">Đặt hàng</button>
                                @csrf

                            </td>

                        </tr>

                    </table>
                    <div class="row flex-column justify-content-between">
                        <h2 class="py-4">Phương thức thanh toán</h2>

                        <div class="form-check mt-3">
                            <input class="form-check-input" id="check1" type="radio" value="0" checked
                                name="check" />
                            <label class="form-check-label">
                                Thanh toán khi nhận hàng
                            </label>
                        </div>
                        <div class="form-check mt-3">
                            <input class="form-check-input" id="check1" type="radio" value="1" name="check" />
                            <label class="form-check-label">
                                Chuyển Khoản
                            </label>
                        </div>

                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <h2 class="py-4">Đơn hàng của bạn</h2>
                @foreach ($cart->items as $key => $value)
                    <div class="row border">
                        <div class="col-md-4"><img src="{{ $value['product_image'] }}" alt=""
                                style="width: 150px;height: 150px;"></div>
                        <div class="col-md-8">

                            <div class="product">
                                <p class="title-product">{{ $value['product_name'] }}</p>
                                <p class="product-quantity">Số lượng: {{ $value['product_quantity'] }}</p>
                                <p class="">Giá tiền: {{ number_format($value['product_price'], 0, '', ',') }}
                                    đ</p>
                                <p>Thành
                                    tiền:{{ number_format($value['product_price'] * $value['product_quantity'], 0, '', ',') }}
                                    đ
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="product-sum fs-5">Tổng tiền: <span
                        class="fs-4 mx-5">{{ number_format($cart->total_price, 0, '', ',') }}đ</span></div>

            </div>
        </div>
    </div>
@endsection


@section('css')
    <style>
        .form-control {
            width: 400px !important;
            height: 40px;
        }


        tr {
            display: flex !important;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }
    </style>
@endsection
