<header class="header">
    <div class="header-top">
        <p>Trang mua hàng nội thất trực tuyến chính hãng!</p>
    </div>
    <div class="header-main padding-container">
        <div class="header-main_log">
            <span>Urban Home</span>
        </div>
        <form action="" class="header-search_form-box">
            <input class="header-search_form-input" type="text" placeholder="Tìm kiếm sản phẩm">
            <button class="header-search_btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
            <div class="product-result-search">
            </div>
        </form>
        <div class="header-phone header-main_sub">
            <p><i class="fa-solid icon fa-square-phone"></i></p>
            <div class="">
                <span>Hotline:</span>
                <br>
                <p>1900.636.099
                </p>
            </div>
        </div>

        @if (empty(auth()->user()))
        <div class="header-login  header-main_sub">
            <p><i class="fa-solid icon fa-user"></i></p>
            <div class="login-register">
                <span><a style="" href="{{route('login.login')}}">Đăng nhập</a>/<a
                        href="{{route('register.view-register')}}">Đăng ký</a></span>
                <br>
                <p>Tài khoản của tôi <i class="fa-solid fa-caret-down"></i>
                </p>
            </div>
        </div>
        @else
        <div class="header-login dropdown">
            <div onclick="dropdown()" class="header-main_sub dropbtn">
                <img class="header-info-user-img" src="{{ asset('upload/' . auth()->user()->avatar ) }}" alt="">
                <div class="header-info-user-name" style="margin-left: 15px;">
                    <p>{{ auth()->user()->name }}</p>
                </div>
            </div>
            <div id="myDropdown" class="dropdown-content">
                <a href="{{route('profile.index')}}">Thông tin</a>
                <a href="#">Hoá đơn</a>
                <a href="{{route('logOut')}}">Đăng xuất</a>
            </div>
        </div>
        @endif

        <div onclick="openNav()" class="header-cart header-main_sub">
            <div class="header-icon-cart">
                <p><i class="fa-solid icon fa-cart-shopping"></i></p>
                @if (session()->exists('cart'))
                <span><?=count(session('cart'))?></span>
                @else
                <span>0</span>
                @endif

            </div>
            <div class="">
                <p>Giỏ hàng
                </p>
            </div>
        </div>
        <div id="mySidenav" class="sidenav cart-list-info">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="" style="padding: 0px 20px ;border-top:1px solid #ccc;">
                @if (session()->exists('cart'))
                <h4 style="margin-top: 10px;">Tổng số : <?=count(session('cart'))?> </h4>
                <?php $sum = 0; ?>
                @foreach (session('cart') as $item)
                <?php  $sum+=$item['number'] * $item['price'] ?>
                <div class="cart-list-item">
                    <div class="" style="display:flex;justify-content: start">
                        <img class="cart-list-item-img " src="{{asset('upload/' .  $item['img'])}}" alt="">
                        <div class="" style="margin-left:20px">
                            <p class="cart-list-item-name">{{ $item['name']}}</p>
                            <p class="cart-list-item-price">{{$item['price']}}₫ <span>({{$item['number']}})</span></p>
                        </div>
                    </div>
                    <a onclick="return confirm('Bạn có muốn xoá sản phẩm này ?')" href="{{route('cart.deleteCart' , $item['id'])}}" class="btn-cart-delete"><i class="fa-solid fa-trash-can"></i></a>
                </div>
                @endforeach
                <h4 style="margin-top: 10px;"> Tổng tiền : <?=number_format($sum, 0 , '.')?>₫ </h4>
                @else
                <span>Giỏ hàng hiện đang trống !!!</span>
                @endif

                <button class="cart-list-view"><a href="{{route('cart.cart')}}" style="text-decoration:none;color:blue">Xem giỏ hàng </a></button>
            </div>
        </div>
    </div>
    <div class="header-menu padding-container">
        <ul class="header-menu_list">
            <li class="header-menu-item"><a href="{{route('home')}}" class="header-menu-item-link">Trang chủ </a></li>
            <li class="header-menu-item"><a href="" class="header-menu-item-link">Giới thiệu</a></li>
            <li class="header-menu-item"><a href="{{route('client.product.product')}}" class="header-menu-item-link">Sản
                    phẩm <i class="fa-solid fa-caret-down"></i></a></li>
            <li class="header-menu-item"><a href="" class="header-menu-item-link">Product View <i
                        class="fa-solid fa-caret-down"></i></a></li>
            <li class="header-menu-item"><a href="{{route('contact')}}" href="" class="header-menu-item-link">Liên
                    hệ</a></li>
        </ul>
    </div>
</header>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
$(document).ready(function() {
    $('.header-search_form-input').on('keyup', function() {
        let keyword = $(this).val();
        $('.product-result-search').css('display', 'block');
        $.get("<?= route('client.product.filterSearch') ?>", {
            keyword: keyword
        }, function($data) {
            $('.product-result-search').html($data);
        });
    });

    $('.header-search_form-input').on('blur', function() {
        setTimeout(() => {
            $('.product-result-search').css('display', 'none');
        }, 1000);
    })
});
</script>