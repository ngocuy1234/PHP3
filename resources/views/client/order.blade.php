@extends('client.layout.master')
@section('title' , 'Liên hệ')
@section('css')
<link rel="stylesheet" href="{{asset('assets/client/css/Pay.css')}}">
@endsection
@section('content')
<div class="content padding-container text-center">
    <h3 class="title-page-name commom-title text-center">Thanh toán</h3>
    <p class="text-center color-text"> Giỏ hàng của bạn , hãy chọn những thứ mình muốn </p>
    <form class="cart-box" action="{{route('order.store')}}" method="POST">
        @csrf
        <div class="">
            <h4 class="title-form">Điền thông tin của bạn</h4>
            <div class="">
                <input type="text" class="input-contact" name="name" value="{{ old('name') }}"
                    placeholder="Tên của bạn ">
                @if ($errors->has('name'))
                <span style="color: red;text-align:left">{{$errors->first('name')}}</span>
                @endif
            </div>
            <input type="text" class="input-contact" name="email" placeholder="Email của bạn">
            @if ($errors->has('email'))
                <span style="color: red;text-align:left">{{$errors->first('email')}}</span>
                @endif
            <div class="form-grid-input">
                <input type="text" class="input-contact" name="address" placeholder="Địa chỉ của bạn ">
                @if ($errors->has('address'))
                <span style="color: red;text-align:left">{{$errors->first('address')}}</span>
                @endif
                <input type="text" class="input-contact" name="phone" placeholder="Số điện thoại của bạn">
                @if ($errors->has('phone'))
                <span style="color: red;text-align:left">{{$errors->first('phone')}}</span>
                @endif
            </div>
            <textarea class="input-contact-textarea" name="note" placeholder="Nội dung" name=""></textarea>
        </div>
        <div class="total-money">
            <div class="order-box">
                <h4 class="title-form-order">Đơn hàng</h4>
                <h3 class="plus-cart">Sản phẩm</h3>
                <?php $sum=0?>
                @if ($cart)

                @foreach ($cart as $item)
                <?php  $sum+=$item['number'] * $item['price'] ?>
                <div class="plus-cart-provisional">
                    <h4>{{$item['name']}} ({{$item['number']}})</h4>
                    <h5><?=number_format($item['price'], 0 , '.')?>₫ </h5>
                </div>

                @endforeach
                @endif
                <div class="plus-cart-provisional">
                    <h3 class="total-name" style="color: #8E0007">Tổng tiền</h3>
                    <h4 class="total-price"> <?=number_format($sum, 0 , '.')?>₫</h4>
                </div>
                <p class="order-note">Sau khi quý khách đặt hàng. Chúng tôi sẽ gửi thông tin đơn hàng qua Email và gọi
                    điện xác nhận đơn hàng. Sau đó sẽ tiến hành vận chuyển hàng. Quý khách thanh toán khi nhận được hàng
                </p>
                <button href="" class="btn-check-out">Tiền hành thanh toán</button>
            </div>
        </div>
    </form>
</div>
@endsection