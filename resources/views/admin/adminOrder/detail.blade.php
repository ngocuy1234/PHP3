@extends('admin.layout.main')
@section('title' , 'Order Detail')
@section('css')
<link rel="stylesheet" href="{{asset('assets/admin/product/product.css')}}">
@endsection
@section('content')
<div class="container">
    <div class="d-flex my-4 product-info-box" style="height:500px">
        <div class="col-4 product-info bg-primary text-white">
            <h4 class="text-white">Order detail</h4>
            <h6 class="text-white">Date buy : {{$orderDetail->created_at->format('H:i d/m/Y')}}</h6>
            <h6 class="text-white">Buyer : {{$orderDetail->name}}</h6>
            <h6 class="text-white">Address : {{$orderDetail->address}}</h6>
            <h6 class="text-white">Phone : {{$orderDetail->phone}}</h6>
            <select class="form-select" data-id="{{$orderDetail->id}}" aria-label="Default select example">
                <option @if ($orderDetail->status == 0)
                    selected
                    @endif value="0">Đang chờ duyệt</option>
                <option @if ($orderDetail->status == 1)
                    selected
                    @endif value="1">Giao hàng</option>
                <option @if ($orderDetail->status == 2)
                    selected
                    @endif value="2">Huỷ đơn</option>
                <option @if ($orderDetail->status == 3)
                    selected
                    @endif value="3">Đã thanh toán</option>
            </select>
            <h6 class="my-3 text-white">Count product : {{count($products)}}</h6>
            <h4 class="my-3 text-white">Total money : <?=number_format($sum, 0 , '.')?>₫</h4>
        </div>
        <div class="col-8 product-info-right table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="text-nowrap">
                        <th>Id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Money</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php $index = 0; ?>
                    @foreach ($products as $item )
                    <tr>
                        <td>{{$index++}}</td>
                        <td>{{$item->product->name}}</td>
                        <td><img style="height:50px" src="{{asset('upload/' . $item->image)}}" alt=""></td>
                        <td>{{$item->quantity}}</td>
                        <td> <?=number_format($item->price, 0 , '.')?>₫</td>
                        <td> <?=number_format($item->price* $item->quantity, 0 , '.')?>đ</td>
                        <td><a  onclick="return confirm('Do you want to delete this line? ')"
                                href="{{route('order.deleteOrderDetail' , $item->id)}}" class="btn btn-danger"><i
                                    class='bx bxs-calendar-x'></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @section('script')
    <script src="{{asset('js/alert-action.js')}}"></script>
    <script>
    $(document).ready(function() {
        $('.form-select').on('change', function() {
            status = $(this).val();
            order_id = $(this).data('id');
            $.get("<?= route('order.updateStatus') ?>", {
                status: status,
                order_id: order_id
            }, function($data) {
                configAlert($data);
                // $('#message').html($data);
            });
        });
    })
    </script>
    @endsection
    @endsection