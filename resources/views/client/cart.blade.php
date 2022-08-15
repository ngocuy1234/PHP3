@extends('client.layout.master')
@section('title' , 'Liên hệ')
@section('css')
<link rel="stylesheet" href="{{asset('assets/client/css/Cart.css')}}">
@endsection
@section('content')
<div class="content padding-container text-center">
    <h3 class="title-page-name commom-title text-center">Giỏ hàng </h3>
    <p class="text-center color-text"> Giỏ hàng của bạn , hãy chọn những thứ mình muốn </p>
    <div class="cart-box">
        <div class="">
            <table class="table">
                <thead>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tổng tiền</th>
                    <th>Xoá</th>
                </thead>
                <tbody>
                    <?php $index = 1;$sum  = 0?>
                    @foreach ($cart as $item)
                    <?php  $sum+=$item['number'] * $item['price'] ?>
                    <tr>
                        <td>{{$index++}}</td>
                        <td class="cart_name-box">
                            <img src="{{ asset('upload/' . $item['img'])}}" alt="" class="cart_img">
                            <div class="product_cart-info-rigth">
                                <p class="product_name">{{$item['name']}}</p>
                                <ul style="margin-top:12px" class="product_atribute-list">
                                    <li>{{$item['size']}}</li>
                                </ul>
                            </div>
                        </td>
                        <td>
                            <div class="number-input">
                                <button data-id="{{$item['id']}}" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                    class="minus change-quantity" ><i class="fa-solid fa-minus"></i></button>
                                <input class="quantity quantity-number-cart-{{$item['id']}}" 
                                    value="{{$item['number']}}" min="0" name="quantity" type="number">
                                <button data-id="{{$item['id']}}" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                    class="plus change-quantity"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </td>
                        <td><?=number_format($item['price'], 0 , '.')?>₫</td>
                        <td><?=number_format($item['price'] * $item['number'], 0 , '.')?>₫</td>
                        <td>
                            <a onclick="return confirm('Bạn có muốn xoá sản phẩm này ?')"
                                href="{{route('cart.deleteCart' , $item['id'])}}" class="btn-delete-cart"><i
                                    class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                    @endforeach

            </table>
            <div class="btn-table-footer">
                <button class="btn-footer btn-continue-now"><a href="{{route('client.product.product')}}"><i
                            class="fa-solid fa-arrow-left"></i> Tiếp tục
                        mua hàng</a></button>
                <button class="btn-footer btn-update-cart"   style="color: #ffff;">Cập nhật giỏ hàng</button>
            </div>
        </div>
        <div class="total-money">
            <h3 class="plus-cart">Cộng giỏ hàng</h3>
            <div class="plus-cart-provisional">
                <h4>Tạm tính</h4>
                <h5> <?=number_format($sum, 0 , '.')?>₫</h5>
            </div>
            <div class="plus-cart-provisional">
                <h3 class="total-name">Tổng tiền</h3>
                <h4 class="total-price"> <?=number_format($sum, 0 , '.')?>₫</h4>
            </div>
            <button class="btn-check-out"><a href="{{route('order.order')}}">Tiền hành thanh toán</a></button>
        </div>
    </div>
    <div class="result"></div>
</div>

@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="{{asset('js/alert-action.js')}}"></script>
<script>

btnUpdate = document.querySelector('.btn-update-cart')
btnUpdate.disabled = true;
btnUpdate.style.opacity = '0.4';
$(document).ready(function() {
    let arr = [];
    $(".change-quantity").on('click', function() {
        btnUpdate.disabled = false;
        btnUpdate.style.opacity = '1';
        let proItem = {};
        let id = $(this).data('id');
        let value = $('.quantity-number-cart-' + id).val(); 
        proItem = {
            id,
            value,
        } 

        if(arr.length == 0){
            arr.push(proItem);
        }else if(arr.length > 0){
            arr =  arr.filter(item => item.id !== id);
            if(arr.length == 0){
                arr.push(proItem)
            }else{
                arr =  [...arr , proItem];
            }
        }
    });

    $('.btn-update-cart').on('click' , () => {
        console.log(JSON.stringify(arr));
        $.get("<?= route('cart.updateCart') ?>", {
            cartUpdate: JSON.stringify(arr)
        }, function($data) {
            if($data == 'success'){
                location.reload();
            }
        })
    })

})
</script>
@endsection