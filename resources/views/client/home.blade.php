@extends('client.layout.master')
@section('title' , 'Trang chủ')
@section('css')
<link rel="stylesheet" href="{{asset('/assets/client/css/Home.css')}}">
@endsection
@section('content')

<div class="banner">
    <img class="w-100" src="https://theme.hstatic.net/1000409762/1000752712/14/slideshow_2.jpg?v=10" alt="">
    <div class="banner-sub_box  padding-container">
        <div class="banner-sub_img-box">
            <img class="w-100 h-100"
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHs7OsnVT6x9iButRu0vQSYpPduxbYvL-SgQ&usqp=CAU"
                alt="">
        </div>
        <div class="banner-sub_img-box">
            <img class="w-100 h-100 "
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSTz2C42dNn5C8YQ017fuWtsrP8Vofp3yUnFw&usqp=CAU"
                alt="">
        </div>
        <div class="banner-sub_img-box">
            <img class="w-100 h-100 "
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRa02xpSPRyVb93rXm0jd9yQrZwH7LF_0jVOw&usqp=CAU"
                alt="">
        </div>
    </div>
</div>
<div class="content">
    <h3 class="header-footer-title commom-title text-center">
        Sản phẩm mới nhất
    </h3>
    <p class="text-center color-text">Cập nhật những sản phẩm mới nhật</p>
    <div class="product-list_box padding-container">
        @foreach ($products as $item)
        <!-- {{$item->id}} -->
        <div class="product-item">
            <div class="product-item_img-box">
                <a href="{{route('client.product.detail' , $item->id)}}">
                    <img class="w-100" src="{{ asset('upload/' . $item->image) }}" alt="">
                </a>
                <div class="product-item_percent">-{{ceil(($item->price - $item->price_sale) * 100/$item->price)}}%
                </div>
                <a href="{{route('client.product.detail' , $item->id)}}" class="product-item_icon">
                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                </a>
            </div>
            <p class="product-item_name"><a href="{{route('client.product.detail' , $item->id)}}">{{$item->name}}</a>
            </p>
            <div class="product-item_price-wraper">
                <div class="product-price-main">
                    <?=number_format($item->price_sale, 0 , '.')?>₫
                </div>
                <div class="product-price_sale">
                    <?=number_format($item->price, 0 , '.')?>₫
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <h3 class="header-footer-title commom-title text-center" style="margin-top:50px">
        Sản phẩm nổi bật
    </h3>
    <p class="text-center color-text">Cập nhật những sản phẩm mới nhật</p>
    <div class="product-list_box padding-container">
        @foreach ($productMoreView as $item)
        <div class="product-item">
            <div class="product-item_img-box">
                <a href="{{route('client.product.detail' , $item->id)}}">
                    <img class="w-100" src="{{ asset('upload/' . $item->image) }}" alt="">
                </a>
                <div class="product-item_percent">-{{ceil(($item->price - $item->price_sale) * 100/$item->price)}}%
                </div>
                <a href="{{route('client.product.detail' , $item->id)}}" class="product-item_icon">
                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                </a>
            </div>
            <!-- {{$item->quantity_view}} -->
            <p class="product-item_name"><a href="{{route('client.product.detail' , $item->id)}}">{{$item->name}}</a>
            </p>
            <div class="product-item_price-wraper">
                <div class="product-price-main">
                    <?=number_format($item->price_sale, 0 , '.')?>₫
                </div>
                <div class="product-price_sale">
                    <?=number_format($item->price, 0 , '.')?>₫
                </div>

            </div>
        </div>
        @endforeach

    </div>

    <div class="category_image-box padding-container">
        <div class="category_image-above-box ">
            <div class="category_image-above-left">
                <div class="category_image-item-box">
                    <img src="https://theme.hstatic.net/1000409762/1000752712/14/img_banner_center_1.jpg?v=10"
                        alt="Avatar" class="image">
                    <div class="overlay">
                        <div class="text">Sản phẩm mới nhất</div>
                    </div>
                </div>
                <div class="category_image-item-box" style="margin-top: 25px">
                    <img src="https://theme.hstatic.net/1000409762/1000752712/14/img_banner_center_2.jpg?v=10"
                        alt="Avatar" class="image">
                    <div class="overlay">
                        <div class="text">Sản phẩm mới nhất</div>
                    </div>
                </div>
            </div>
            <div class="category_image-above-right">
                <div class="category_image-item-box">
                    <img src="https://theme.hstatic.net/1000409762/1000752712/14/img_banner_center_3.jpg?v=10"
                        alt="Avatar" class="image">
                    <div class="overlay">
                        <div class="text">Hello World</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="category_image-down-box">
            <div class="category_image-item-box">
                <img src="https://theme.hstatic.net/1000409762/1000752712/14/img_collection_info_1.jpg?v=10"
                    alt="Avatar" class="image">
                <div class="overlay">
                    <div class="text">Sản phẩm mới nhất</div>
                </div>
            </div>
            <div class="category_image-item-box">
                <img src="https://theme.hstatic.net/1000409762/1000752712/14/img_collection_info_2.jpg?v=10"
                    alt="Avatar" class="image">
                <div class="overlay">
                    <div class="text">Sản phẩm mới nhất</div>
                </div>
            </div>
            <div class="category_image-item-box">
                <img src="https://theme.hstatic.net/1000409762/1000752712/14/img_collection_info_4.jpg?v=10"
                    alt="Avatar" class="image">
                <div class="overlay">
                    <div class="text">Sản phẩm mới nhất</div>
                </div>
            </div>
            <div class="category_image-item-box">
                <img src="https://theme.hstatic.net/1000409762/1000752712/14/img_collection_info_3.jpg?v=10"
                    alt="Avatar" class="image">
                <div class="overlay">
                    <div class="text">Sản phẩm mới nhất</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection