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
                <img class="header-info-user-img"
                    src="{{ asset('upload/'. auth()->user()->avatar) ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYmkp9a2rrD1Sskb9HLt5mDaTt4QaIs8CcBg&usqp=CAU' }}"
                    alt="">
                <div class="header-info-user-name" style="margin-left: 15px;">
                    <p>{{ auth()->user()->name }}</p>
                </div>
            </div>
            <div id="myDropdown" class="dropdown-content">
                <a href="#">Thông tin</a>
                <a href="#">Hoá đơn</a>
                <a href="{{route('logOut')}}">Đăng xuất</a>
            </div>
        </div>
        @endif

        <div onclick="openNav()" class="header-cart header-main_sub">
            <div class="header-icon-cart">
                <p><i class="fa-solid icon fa-cart-shopping"></i></p>
                <span>0</span>
            </div>
            <div class="">
                <p>Giỏ hàng
                </p>
            </div>
        </div>
        <div id="mySidenav" class="sidenav cart-list-info">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="" style="padding: 0px 20px ;border-top:1px solid #ccc;">
                <h4 style="margin-top: 10px;">Tổng số : 10</h4>
                <div class="cart-list-item">
                    <img class="cart-list-item-img "
                        src="https://product.hstatic.net/1000409762/product/sp11-2_d58d2329380c41f1885a093a5cf2f27c_large.jpg"
                        alt="">
                    <div class="">
                        <p class="cart-list-item-name">Ghế sofa giường kéo Roots</p>
                        <p class="cart-list-item-price">890,000₫ <span>(4)</span></p>
                    </div>
                    <a href="" class="btn-cart-delete"><i class="fa-solid fa-trash-can"></i></a>
                </div>
                <div class="cart-list-item">
                    <img class="cart-list-item-img "
                        src="https://product.hstatic.net/1000409762/product/sp11-2_d58d2329380c41f1885a093a5cf2f27c_large.jpg"
                        alt="">
                    <div class="">
                        <p class="cart-list-item-name">Ghế sofa giường kéo Roots</p>
                        <p class="cart-list-item-price">890,000₫ <span>(4)</span></p>
                    </div>
                    <a href="" class="btn-cart-delete"><i class="fa-solid fa-trash-can"></i></a>
                </div>
                <div class="cart-list-item">
                    <img class="cart-list-item-img "
                        src="https://product.hstatic.net/1000409762/product/sp11-2_d58d2329380c41f1885a093a5cf2f27c_large.jpg"
                        alt="">
                    <div class="">
                        <p class="cart-list-item-name">Ghế sofa giường kéo Roots</p>
                        <p class="cart-list-item-price">890,000₫ <span>(4)</span></p>
                    </div>
                    <a href="" class="btn-cart-delete"><i class="fa-solid fa-trash-can"></i></a>
                </div>
                <div class="cart-list-item">
                    <img class="cart-list-item-img "
                        src="https://product.hstatic.net/1000409762/product/sp11-2_d58d2329380c41f1885a093a5cf2f27c_large.jpg"
                        alt="">
                    <div class="">
                        <p class="cart-list-item-name">Ghế sofa giường kéo Roots</p>
                        <p class="cart-list-item-price">890,000₫ <span>(4)</span></p>
                    </div>
                    <a href="" class="btn-cart-delete"><i class="fa-solid fa-trash-can"></i></a>
                </div>
                <button class="cart-list-view">Xem giỏ hàng </button>
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