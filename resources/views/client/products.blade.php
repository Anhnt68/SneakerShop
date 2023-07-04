@extends('layouts.client')

@section('content')
    <div class="container">

        <div class="row box-detail">
            @foreach ($product as $key => $value)
                <div class="col-sm-7 text-center">
                    <img src="{{ $value->product_image }}" alt="" class="product-image-detail" style="width: 500px">
                </div>
                <div class="col-sm-5">
                    <p class="product-title-detail">{{ $value->product_name }}</p>
                    <p class="product-price-detail">{{ number_format($value->product_price, 0, '', ',') }}đ</p>
                    <p class="">{{ $value->category->cate_name }}</p>
                    <p>
                    <form action="" method="GET">
                        </p>
                        <p><a href="{{ route('cart.add', ['id' => $value->id]) }}" class="btn btn-primary">Add to cart</a>
                        </p>
                </div>
                <div class="row">
                    <p class="product-detail">{!! $value->product_desc !!}</p>
                </div>
            @endforeach

        </div>

    </div>
@endsection
