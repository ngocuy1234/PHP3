@extends('admin.layout.main')
@section('title' , 'Admin Product')
@section('css')
<link rel="stylesheet" href="{{asset('assets/admin/product/product.css')}}">
@endsection
@section('content')
<div class="container">
    <div class="d-flex my-4 product-info-box">
        <div class="col-4 product-info bg-info text-white">
            <!-- <img src="{{asset('upload/' . $detail->image)}}" alt=""> -->
            <p class="fs-4 text-dark">{{$detail->name}}</p>
            <img class="product-image"
                src="{{asset('upload/' . $detail->image)}}"
                alt="">
            <p class="my-2 fs-5">Category: {{$detail->category->name}}</p>
            <p class="my-2  fs-5">Quantity: {{$detail->quantity}}</p>
            <p class="my-2  fs-5">Price: {{$detail->price}}</p>
            <p class="my-2  fs-5">Price sale: <span class="price_sale">{{$detail->price}}</span></p>
            <p class="my-2  fs-5">Number_view: {{$detail->quantity_view}}</p>
            <p class="my-2  fs-5">Status: @if ($detail->status == 0)
                <span class="unactive">Unactive</span>
                @else
                <span class="active">Active</span>
                @endif
            </p>
        </div>
        <div class="col-8 product-info-right">
            <button class="btn w-100 text-start btn-light  p-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <span class="fs-5 fw-bold"> Description </span>
                <br>
                View now
            </button>
            <button class="btn w-100 mt-3 text-start btn-light  p-3" data-bs-toggle="modal" data-bs-target="#service">
                <span class="fs-5 fw-bold"> Intro service </span>
                <br>
                View now
            </button>
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Description</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?= $detail->description?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--  -->
            <div class="modal fade" id="service" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Description</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?= $detail->intro_service?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-light w-100 btn-properties btn-white">
        <a href="{{ route('product.detail.distortion' , $detail->id) }}" >Properties &nbsp; <span class="bg-info p-2 text-white rounded">{{$countProperties}}</span></a>
    </button>
</div>
@endsection