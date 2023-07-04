@extends('layouts.client')

@section('content')

<div class="container">
    <div class="row">
        @foreach ($product as $key => $value)

        <div class="col-sm-3 text-center">
            <a href="{{ route('product',['id'=>$value->id]) }}" class="box-product">
                <img src="{{ $value->product_image }}" alt="" class="product-image">
                <p class="product-title">{{ $value->product_name }}</p>
                <p class="product-price">{{ number_format($value->product_price, 0, '', ',')  }}đ</p>
                <p class="">{{ $value->category->cate_name }}</p>
            </a>
        </div>
        @endforeach
  </div>
</div>
@endsection
