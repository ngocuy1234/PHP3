@extends('client.layout.master')
@section('title' , 'Sản phẩm chi tiet')
@section('css')
<link rel="stylesheet" href="{{asset('/assets/client/css/Product-detail.css')}}">
@endsection
@section('content')
<div class="content">
    <div class="content-product-info_box padding-container">
        <div class="content-product-info_left">
            <div class="container-product-image_box">
                <img id="expandedImg" src="{{ asset('upload/'. $product->image)}}" style="width:100%">
                <div class="content-product_info-row">
                    <div class="column">
                        <img src="{{ asset('upload/'. $product->image)}}" style="width:100%"
                            onclick="myFunction(this);">
                    </div>
                    @foreach ($product->productOption as $item)
                    <div class="column">
                        <img src="{{ asset('upload/'. $item->image)}}" alt="Nature" style="width:100%"
                            onclick="myFunction(this);">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="content-product-info_right">
            <form action="{{route('cart.addCart')}}" method="POST">
                @csrf
                <input hidden name="id" value="{{$product->id}}" type="text">
                <div class="header-product-info_right">
                    <h3 class="product-name">{{$product->name}}</h3>
                    <div class="product-sale">-{{ceil(($product->price - $product->price_sale) * 100/$product->price)}}%
                    </div>
                </div>
                <div class="product-item_price-wraper">
                    <div class="product-price-main">
                        <?=number_format($product->price_sale, 0 , '.')?>₫
                    </div>
                    <div class="product-price_sale color-text">
                        <?=number_format($product->price, 0 , '.')?>₫
                    </div>
                </div>
                <div class="product-atribute_box">
                    <p>{{$size->name}} : </p>
                    <ul class="product-atribute_list-size">
                        @foreach ($size->optionDetail as $item)
                            <label data-id="2"  class="lable-size" for="{{$item->name}}">{{$item->name}}</label>
                            <input id="{{$item->name}}" hidden  class="size" value="{{$item->name}}" name="size" type="radio">
                        @endforeach
                    </ul>
                </div>
                <div class="product-atribute_box">
                    <p>{{$color->name}} : </p>
                    <ul class="product-atribute_list-color">
                    @foreach ($color->optionDetail as $item)
                        <label for="{{$item->name}}" style="background-color: <?= $item->code_color ?>"></label>
                        <input id="{{$item->name}}" hidden name="color" value="{{$item->name}}" type="radio">
                    @endforeach
                      
                    </ul>
                </div>
                <p class="alert-product-number">Còn {{$product->quantity}} sản phẩm</p>
                <div class="">
                    <div class="number-input">
                        <a onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus"><i class="fa-solid fa-minus"></i></a>
                        <input class="quantity" min="0" name="quantity" value="1" type="number">
                        <a onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"><i
                                class="fa-solid fa-plus"></i></a>
                    </div>
                    <button class="btn-add-to-cart">Thêm giỏ hàng</button>
                </div>
            </form>
            <div class="tabs1">
                <div class="tab-item active tablinks" id="defaultOpen" onclick="openCity(event, 'London')">Mô tả
                </div>
                <div class="tab-item tablinks" onclick="openCity(event, 'Paris')">
                    ĐIỀU KHOẢN DỊCH VỤ</div>
                <div class="tab-item tablinks" onclick="openCity(event, 'Tokyo')">
                    CHÍNH SÁCH ĐỔI TRẢ</div>
            </div>
            <div id="London" class="tabcontent">
                <?=$product->description?>
            </div>

            <div id="Paris" class="tabcontent">
                <?=$product->intro_service?>
            </div>

            <div id="Tokyo" class="tabcontent">
                <h3>Tokyo</h3>
                <p>Tokyo is the capital of Japan.</p>
            </div>
        </div>
    </div>
    <h3 class="commom-title product-related_title text-center">
        SẢN PHẨM LIÊN QUAN
    </h3>
    <p class="text-center color-text">Luôn sẵn sáng hỗ trợ và tư vấn cho bạn để có sản phẩm tốt nhất.</p>
    <div class="product-related_box padding-container product-list_box">
        @foreach ($productRelate as $item)
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

    <!-- ----------------- -->
    @if (count($productViewed) != 0)
    <h3 style="text-transform: uppercase" class="commom-title product-related_title text-center">
        Sản phẩm đã xem
    </h3>
    <p class="text-center color-text">Sản phẩm bạn vừa xem.</p>
    <div class="product-related_box padding-container product-list_box">
        @foreach ($productViewed as $item)
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
    @endif
</div>
@endsection
@section('script')
<script src="{{asset('assets/client/js/tab-component.js')}}"></script>
<script src="{{asset('assets/client/js/tab-slider.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
</script>
@endsection