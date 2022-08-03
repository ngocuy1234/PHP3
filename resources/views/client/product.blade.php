@extends('client.layout.master')
@section('title' , 'Sản phẩm')
@section('css')
<link rel="stylesheet" href="{{asset('/assets/client/css/Product.css')}}">
@endsection
@section('content')

<div class="banner">
    <img class="w-100" src="https://theme.hstatic.net/1000409762/1000752712/14/collection_banner.jpg?v=10" alt="">
</div>

<div class="content padding-container">
    <header class="header-content-box">
        <div class="icon-open-filer-all" onclick="openNavFilter()">
            <i class="fa-solid fa-arrow-down-short-wide"></i>
            Filter
        </div>
        <div class="title-box text-center">
            <h3 class="commom-title">Tất cả sản phẩm</h3>
        </div>
        <div class="selected-box">
            <select class="select" name="" id="">
                <option value="">Mới nhất</option>
                <option value="">Gần đây</option>
                <option value="">Bán chạy nhất</option>
            </select>
        </div>
    </header>
    <div id="myNav" class="overlay">

        <!-- Button to close the overlay navigation -->
        <a href="javascript:void(0)" class="closebtn" onclick="closeNavFilter()">&times;</a>

        <!-- Overlay content -->
        <div class="overlay-content">
            <button class="accordion">Loai hinh sản phẩm</button>
            <div class="panel">
                <ul>
                    <li><a href=""><i class="fa-solid fa-caret-right"></i> Tất cả sản phẩm</a></li>
                    @foreach ($rooms as $item)
                    <li><a href=""><i class="fa-solid fa-caret-right"></i>{{$item->name}}</a></li>
                    @endforeach
                </ul>
            </div>

            <button class="accordion">Thương hiệu</button>
            <div class="panel">
                <ul>
                    @foreach ($cates as $item)
                    <li><a href=""><i class="fa-solid fa-registered"></i>{{$item->name}}i</a></li>
                    @endforeach
                </ul>
            </div>

            <button class="accordion">GIÁ SẢN PHẨM</button>
            <div class="panel">
                <ul>
                    <li><a href=""><i class="fa-solid fa-dollar-sign"></i> Dưới 500,000₫</a></li>
                    <li><a href=""><i class="fa-solid fa-dollar-sign"></i> 500,000₫ - 1,000,000₫</a></li>
                    <li><a href=""><i class="fa-solid fa-dollar-sign"></i> 1,000,000₫ - 1,500,000₫</a></li>
                </ul>
            </div>
            <button class="accordion">MÀU SẮC</button>
            <div class="panel">
                <ul class="filter-list-color">
                    <li><a class="color-blue" href=""></a></li>
                    <li><a class="color-red" href=""></a></li>
                    <li><a class="color-pink" href=""></a></li>
                    <li><a class="color-gray" href=""></a></li>
                    <li><a class="color-orange" href=""></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="product-list_box ">
        @foreach ($products as $item)
        <div class="product-item">
            <div class="product-item_img-box">
                <a href="{{route('productdetail')}}">
                    <img class="w-100" src="{{ asset('upload/' . $item->image) }}" alt="">
                </a>
                <div class="product-item_percent">-{{(ceil($item->price - $item->price_sale) * 100/$item->price)}}%</div>
                <a href="{{route('productdetail')}}" class="product-item_icon">
                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                </a>
            </div>
            <!-- {{$item->quantity_view}} -->
            <p class="product-item_name"><a href="{{route('productdetail')}}">{{$item->name}}</a></p>
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

</div>



@endsection
@section('script')
<script src="{{asset('assets/client/js/filter-product.js')}}"></script>
@endsection