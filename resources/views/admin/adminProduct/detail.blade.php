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
                src="data:image/jpeg;base64,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"
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
        <a href="{{ route('product.detail.distortion' , $detail->id) }}" >Properties &nbsp; <span class="bg-info p-2 text-white rounded">0</span></a>
    </button>
</div>
@endsection