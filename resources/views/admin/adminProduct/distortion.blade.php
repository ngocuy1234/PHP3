@extends('admin.layout.main')
@section('title' , 'Admin Product')
@section('content')
<div class="container my-4">

    <div class="col-3 mb-3">
        <form action="{{route('product.distortionUpdateQuantity')}}" method="POST">
            @csrf
            <input hidden type="text" value="{{$product->id}}" name="id">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Quantity distortion :</label>
                <input type="number" name="quantity_distortion" class="form-control" id="exampleFormControlInput1">
            </div>
            <button id="form-quantity" class="btn btn-primary">Add</button>
        </form>
    </div>

    <div class="result-quantity">
        @csrf
        <h4>Total : {{$product->quantity_distortion}} distortion</h4>
        <div class="accordion" id="accordionExample">
            @for ($i = 0; $i < $product->quantity_distortion; $i++)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse-{{$i}}" aria-expanded="true" aria-controls="collapseOne">
                            Distortion {{$i +1}}
                        </button>
                    </h2>
                    <div id="collapse-{{$i}}" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <form action="{{route('product.distortionStore')}}" method="POST" class="row"
                                enctype=multipart/form-data>
                                @csrf
                                <div class="col-6">
                                    @foreach ($distortie as $item)
                                    <input hidden type="text" value="{{$product->id}}" name="product_id">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Distortie
                                            {{$item->name}}</label>
                                        <select class="form-select" name="distortie[]"
                                            aria-label="Default select example">
                                            @foreach ($item->optionDetail as $option)
                                            <option value="{{$option->id}}">{{$option->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endforeach
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Price</label>
                                        <input type="file" name="image">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Price</label>
                                        <input type="text" class="form-control" name="unit_price" placeholder="Price"
                                            id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Slock</label>
                                        <input type="text" class="form-control" name="available_stock"
                                            placeholder="Quantity" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <button class="btn btn-primary">Add distortie</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endfor

        </div>

    </div>
   

</div>
@endsection
@section('script')
<script src="{{asset('assets/admin/product/distortion.js')}}"></script>
@endsection