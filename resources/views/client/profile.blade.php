@extends('client.layout.master')
@section('title' , 'Trang chủ')
@section('css')
<link rel="stylesheet" href="{{asset('/assets/client/css/profile.css')}}">
@endsection
@section('content')
<div class="content padding-container">
    <div class="content-asile">
        <div class="header-asile">
            <img class="header-asile-img"
                src="https://thumbs.dreamstime.com/b/male-avatar-icon-flat-style-male-user-icon-cartoon-man-avatar-hipster-vector-stock-91462914.jpg"
                alt="">
            <div class="header-info-asile">
                <h4 class="header-info-name">Nguyen Ngoc Uy</h4>
                <a href="" class="header-info-asile-edit"> <i class="fa-solid fa-pen"></i> Sửa thông tin</a>
            </div>
        </div>
        <button class="tablinks active" onclick="openCity(event, 'Info-user')">Thông tin cá
            nhân</button>
        <button class="tablinks" @if (empty($orderDetail)) id="defaultOpen" @endif
            onclick="openCity(event, 'Order')">Đơn hàng</button>
        @if (!empty($orderDetail))
        <button class="tablinks" id="defaultOpen" onclick="openCity(event, 'Other')">Chi tiết đơn hàng</button>
        @endif
    </div>
    <div class="content-main">
        <div id="Order" class="tabcontent">
            <div class="tabcontent-header">
                <h3 class="content-item-title">Hoá đơn</h3>
                <p>Tổng hợp các hoá đơn của bạn</p>
            </div>
            <table class="table-order" border="1">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Người nhận</th>
                        <th>Ngày mua</th>
                        <th>Số SP</th>
                        <th>Thành tiền</th>
                        <th>Trạng thái</th>
                        <th>Chi tiết</th>
                        <th>Huỷ đơn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1; ?>
                    @foreach ($order as $item)
                    <tr>
                        <td>
                            {{$index++}}
                        </td>
                        <td>
                            {{$item->name}}
                        </td>
                        <td>
                            {{date_format($item->created_at,"H:i d/m/Y ")}}
                        </td>
                        <td>
                            {{$item->status}}
                        </td>
                        <td>
                            200000d
                        </td>
                        <td>
                            @if ($item->status == 0)
                            <span style="color:#2C3639; font-weight: bold">Đang chờ duyệt</span>
                            @elseif ($item->status == 1)
                            <span style="color:#FEB139; font-weight: bold">Đang giao hàng</span>
                            @elseif ($item->status == 2)
                            <span style="color:#EB1D36; font-weight: bold">Đã huỷ</span>
                            @else
                            <span style="color:#377D71; font-weight: bold">Đã thanh toán</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('profile.order' , $item->id) }}" class="btn-detail">Chi tiết</a>
                        </td>
                        <td>
                            @if ($item->status == 0)
                            <a onclick="return  confirm('Bạn có muốn huỷ đơn hàng này ?')"
                                class="btn-detail btn-change-order"
                                href="{{route('profile.updateStatus' , $item->id)}}">Huỷ đơn</a>
                            @endif
                        </td>
                        <style>
                        .btn-change-order {
                            text-decoration: none;
                            font-size: 12px;
                            background-color: #EB1D36;
                        }

                        .btn-detail {
                            padding: 3px 5px;
                            font-size: 12px;
                            text-decoration: none;

                        }
                        </style>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div id="Info-user" class="tabcontent">
            <div class="tabcontent-header">
                <h3 class="content-item-title">Thông tin cá nhân</h3>
                <p>Thông tin cá nhân của bạn</p>
            </div>
            <form class="form-edit-info-user" action="{{route('profile.updateInfo')}}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-grid-input">
                    <div class="list-input-info">
                        <input type="text" class="input-contact" name="name" value="{{$user->name}}"
                            placeholder="Tên của bạn ">
                        <input type="email" class="input-contact" name="email" value="{{$user->email}}"
                            placeholder="Email của bạn">
                        <input type="password" class="input-contact" name="password" placeholder="Password của bạn">
                        <input type="text" class="input-contact" name="address" value="{{$user->address}}"
                            placeholder="Địa chỉ của bạn ">
                        <input type="text" class="input-contact" name="phone" value="{{$user->phone}}"
                            placeholder="Số điện thoại của bạn">
                    </div>
                    <div class="wrapper-image">
                        <div class="imgae-box">
                            <img id="output" src="{{asset('upload/' . $user->avatar)}}" alt="">
                        </div>
                        <br>
                        <div class="">
                            <label class="file-name" for="file">Chọn ảnh</label>
                            <input name="avatar" hidden id="file" type="file" accept="image/*"
                                onchange="loadFile(event)">
                        </div>
                        <p class="file-name-note">Lưu ý : Chọn ảnh jpg , png </p>
                    </div>
                </div>
                <button class="btn-change-info">Lưu thay đổi</button>
            </form>
        </div>
        @if (!empty($orderDetail))
        <div id="Other" class="tabcontent">
            <div class="tabcontent-header">
                <h3 class="content-item-title">Chi tiết đơn hàng</h3>
                <p>Chi tiết từng đơn hàng của bạn</p>
            </div>
            <h3>Thông tin :</h3>
            <ul class="list-info-user">
                <li>Name : <span>{{$orderDetail->name}}</span></li>
                <li>Email : <span>{{$orderDetail->email}}</span></li>
                <li>Địa chỉ : <span>{{$orderDetail->address}}</span></li>
                <li>Số điện thoại : <span>{{$orderDetail->phone}}</span></li>
                <li>Trạng thái :
                    @if ($orderDetail->status == 0)
                    <span style="color:#2C3639; font-weight: bold">Đang chờ duyệt</span>
                    @elseif ($orderDetail->status == 1)
                    <span style="color:#FEB139; font-weight: bold">Đang giao hàng</span>
                    @elseif ($orderDetail->status == 2)
                    <span style="color:#EB1D36; font-weight: bold">Đã huỷ</span>
                    @else
                    <span style="color:#377D71; font-weight: bold">Đã thanh toán</span>
                    @endif
                </li>

            </ul>
            <table class="table-order" border="1">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá tiền</th>
                        <th>Thành tiền</th>
                        @if ($orderDetail->status == 0)
                            <th>Xoa</th>
                        @endif
                    </tr>
                </thead>

                <tbody>
                    <?php $index = 1?>
                    @foreach ($proOrderDetail as $item)
                    <tr>
                        <td>
                            {{$index++}}
                        </td>
                        <td>
                            <div class="td-product">
                                <img src="{{ asset('upload/'. $item->image) }}" alt="">
                                <div class="order-product">
                                    <span class="name">{{$item->product->name}}</span>
                                    <br>
                                    <span>{{$item->atribute}}</span>
                                </div>
                            </div>

                        </td>
                        <td>
                            {{$item->quantity}}
                        </td>
                        <td>
                            <?=number_format($item->price, 0 , '.')?>₫
                        </td>
                        <td>
                            <?=number_format($item->price * $item->quantity, 0 , '.')?>₫
                        </td>
                        @if ($orderDetail->status == 0)
                        <td>
                            <a class="btn-delete-product" onclick="return confirm('Bạn có muốn xoá sản phẩm này ?')"
                                href="{{ route('profile.deleteProOrder' , $item->id) }}"><i
                                    class="fa-solid fa-trash-can"></i></a>
                        </td>
                        @endif
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <h3 class="money-total">Tổng tiền: <span> <?=number_format($sum, 0 , '.')?>₫</span></h3>
        </div>
        @endif
    </div>
</div>
@endsection
@section('script')
<script src="{{asset('js/alert-action.js')}}"></script>
<script>
function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

document.getElementById("defaultOpen").click();


var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};
</script>
@endsection