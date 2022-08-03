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
                <img id="expandedImg"
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdwyMFRcoKj1kEEiDpD_S-Vh6rsVxsL3rCxg&usqp=CAU"
                    style="width:100%">
                <div class="content-product_info-row">
                    <div class="column">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdwyMFRcoKj1kEEiDpD_S-Vh6rsVxsL3rCxg&usqp=CAU"
                            alt="Nature" style="width:100%" onclick="myFunction(this);">
                    </div>
                    <div class="column">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwGPF8X5lgcLBtUZUXV9kPPpfw7IuIsTq3uQ&usqp=CAU"
                            alt="Snow" style="width:100%" onclick="myFunction(this);">
                    </div>
                    <div class="column">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTx4Ej3sddJTqtqN48tLwfcukxY-e70Aev4Dw&usqp=CAU"
                            alt="Mountains" style="width:100%" onclick="myFunction(this);">
                    </div>
                    <div class="column">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4qPmyou8HM0n-ia6ZoZYnSPZDyiyfE1Rxlw&usqp=CAU"
                            alt="Lights" style="width:100%" onclick="myFunction(this);">
                    </div>
                </div>
            </div>
        </div>
        <div class="content-product-info_right">
            <div class="header-product-info_right">
                <h3 class="product-name">Ghế sofa giường kéo Roots</h3>
                <div class="product-sale">25%</div>
            </div>
            <div class="product-item_price-wraper">
                <div class="product-price-main">
                    890,000₫
                </div>
                <div class="product-price_sale color-text">
                    1,250,000₫
                </div>
            </div>
            <div class="product-atribute_box">
                <p>Màu sắc : </p>
                <ul class="product-atribute_list-color">
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
            <p class="alert-product-number">Còn 10 sản phẩm</p>
            <div class="">
                <div class="number-input">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"><i
                            class="fa-solid fa-minus"></i></button>
                    <input class="quantity" min="0" name="quantity" value="1" type="number">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"><i
                            class="fa-solid fa-plus"></i></button>
                </div>
                <button class="btn-add-to-cart">Thêm giỏ hàng</button>
            </div>
            <div class="tabs1">
                <div class="tab-item active tablinks" id="defaultOpen" onclick="openCity(event, 'London')">Mô tả
                </div>
                <div class="tab-item tablinks" onclick="openCity(event, 'Paris')">
                    ĐIỀU KHOẢN DỊCH VỤ</div>
                <div class="tab-item tablinks" onclick="openCity(event, 'Tokyo')">
                    CHÍNH SÁCH ĐỔI TRẢ</div>
            </div>
            <div id="London" class="tabcontent">
                1. Điều kiện đổi trả

                Quý Khách hàng cần kiểm tra tình trạng hàng hóa và có thể đổi hàng/ trả lại hàng ngay tại thời
                điểm giao/nhận hàng trong những trường hợp sau:

                Hàng không đúng chủng loại, mẫu mã trong đơn hàng đã đặt hoặc như trên website tại thời điểm đặt
                hàng.
                Không đủ số lượng, không đủ bộ như trong đơn hàng.
                Tình trạng bên ngoài bị ảnh hưởng như rách bao bì, bong tróc, bể vỡ…
                Khách hàng có trách nhiệm trình giấy tờ liên quan chứng minh sự thiếu sót trên để hoàn thành
                việc hoàn trả/đổi trả hàng hóa.



                2. Quy định về thời gian thông báo và gửi sản phẩm đổi trả

                Thời gian thông báo đổi trả: trong vòng 48h kể từ khi nhận sản phẩm đối với trường hợp sản phẩm
                thiếu phụ kiện, quà tặng hoặc bể vỡ.
                Thời gian gửi chuyển trả sản phẩm: trong vòng 14 ngày kể từ khi nhận sản phẩm.
                Địa điểm đổi trả sản phẩm: Khách hàng có thể mang hàng trực tiếp đến văn phòng/ cửa hàng của
                chúng tôi hoặc chuyển qua đường bưu điện.
                Trong trường hợp Quý Khách hàng có ý kiến đóng góp/khiếu nại liên quan đến chất lượng sản phẩm,
                Quý Khách hàng vui lòng liên hệ đường dây chăm sóc khách hàng của chúng tôi.
                1. Điều kiện đổi trả

                Quý Khách hàng cần kiểm tra tình trạng hàng hóa và có thể đổi hàng/ trả lại hàng ngay tại thời
                điểm giao/nhận hàng trong những trường hợp sau:

                Hàng không đúng chủng loại, mẫu mã trong đơn hàng đã đặt hoặc như trên website tại thời điểm đặt
                hàng.
                Không đủ số lượng, không đủ bộ như trong đơn hàng.
                Tình trạng bên ngoài bị ảnh hưởng như rách bao bì, bong tróc, bể vỡ…
                Khách hàng có trách nhiệm trình giấy tờ liên quan chứng minh sự thiếu sót trên để hoàn thành
                việc hoàn trả/đổi trả hàng hóa.



                2. Quy định về thời gian thông báo và gửi sản phẩm đổi trả

                Thời gian thông báo đổi trả: trong vòng 48h kể từ khi nhận sản phẩm đối với trường hợp sản phẩm
                thiếu phụ kiện, quà tặng hoặc bể vỡ.
                Thời gian gửi chuyển trả sản phẩm: trong vòng 14 ngày kể từ khi nhận sản phẩm.
                Địa điểm đổi trả sản phẩm: Khách hàng có thể mang hàng trực tiếp đến văn phòng/ cửa hàng của
                chúng tôi hoặc chuyển qua đường bưu điện.
                Trong trường hợp Quý Khách hàng có ý kiến đóng góp/khiếu nại liên quan đến chất lượng sản phẩm,
                Quý Khách hàng vui lòng liên hệ đường dây chăm sóc khách hàng của chúng tôi.
            </div>

            <div id="Paris" class="tabcontent">
                <h3>Paris</h3>
                <p>Paris is the capital of France.</p>
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
        <div class="product-item">
            <div class="product-item_img-box">
                <img class="w-100"
                    src="https://product.hstatic.net/1000409762/product/sp12-1_5316e032a8b0403b8fe26c4cd6bef167_large.jpg"
                    alt="">
                <div class="product-item_percent">25%</div>
                <div class="product-item_icon">
                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                </div>
            </div>
            <p class="product-item_name"><a href="">Ấm trà inox không ghỉ</a></p>
            <div class="product-item_price-wraper">
                <div class="product-price-main">
                    890,000₫
                </div>
                <div class="product-price_sale">
                    1,250,000₫
                </div>
            </div>
        </div>
        <div class="product-item">
            <div class="product-item_img-box">
                <img class="w-100"
                    src="https://product.hstatic.net/1000409762/product/sp12-1_5316e032a8b0403b8fe26c4cd6bef167_large.jpg"
                    alt="">
                <div class="product-item_percent">25%</div>
                <div class="product-item_icon">
                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                </div>
            </div>
            <p class="product-item_name"><a href="">Ấm trà inox không ghỉ</a></p>
            <div class="product-item_price-wraper">
                <div class="product-price-main">
                    890,000₫
                </div>
                <div class="product-price_sale">
                    1,250,000₫
                </div>
            </div>
        </div>
        <div class="product-item">
            <div class="product-item_img-box">
                <img class="w-100"
                    src="https://product.hstatic.net/1000409762/product/sp12-1_5316e032a8b0403b8fe26c4cd6bef167_large.jpg"
                    alt="">
                <div class="product-item_percent">25%</div>
                <div class="product-item_icon">
                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                </div>
            </div>
            <p class="product-item_name"><a href="">Ấm trà inox không ghỉ</a></p>
            <div class="product-item_price-wraper">
                <div class="product-price-main">
                    890,000₫
                </div>
                <div class="product-price_sale">
                    1,250,000₫
                </div>
            </div>
        </div>
        <div class="product-item">
            <div class="product-item_img-box">
                <img class="w-100"
                    src="https://product.hstatic.net/1000409762/product/sp12-1_5316e032a8b0403b8fe26c4cd6bef167_large.jpg"
                    alt="">
                <div class="product-item_percent">25%</div>
                <div class="product-item_icon">
                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                </div>
            </div>
            <p class="product-item_name"><a href="">Ấm trà inox không ghỉ</a></p>
            <div class="product-item_price-wraper">
                <div class="product-price-main">
                    890,000₫
                </div>
                <div class="product-price_sale">
                    1,250,000₫
                </div>
            </div>
        </div>
        <div class="product-item">
            <div class="product-item_img-box">
                <img class="w-100"
                    src="https://product.hstatic.net/1000409762/product/sp12-1_5316e032a8b0403b8fe26c4cd6bef167_large.jpg"
                    alt="">
                <div class="product-item_percent">25%</div>
                <div class="product-item_icon">
                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                </div>
            </div>
            <p class="product-item_name"><a href="">Ấm trà inox không ghỉ</a></p>
            <div class="product-item_price-wraper">
                <div class="product-price-main">
                    890,000₫
                </div>
                <div class="product-price_sale">
                    1,250,000₫
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{asset('assets/client/js/tab-component.js')}}"></script>
<script src="{{asset('assets/client/js/tab-slider.js')}}"></script>
@endsection