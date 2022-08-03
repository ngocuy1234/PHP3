@extends('admin.layout.main')
@section('title' , 'Danh mục')
@section('content')
<div class="container">
    <div class="d-flex  justify-content-between align-item-center">
        <h3 class="my-3">List protertie</h3>
        <button class="btn btn-info back text-white mt-2">Refest</button>
    </div>
    <div class="row">
        <div class="col-4">
            <h5 style="color: #D61C4E">Form add propertie</h5>
            <form class="mt-3" method="POST" action="{{route('product.propertieStore')}}">
      
            @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Display type</label>
                    <select class="form-select" name="display_types" aria-label="Default select example">
                        <option value="0">By name</option>
                        <option value="1">By color</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add protertie</button>
            </form>
        </div>
        <div class="col-8">
            <table class="table">
                <thead>
                    <tr class="text-nowrap">
                        <th>Id</th>
                        <th>Name</th>
                        <th>Type display</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php $index = 1 ?>
                    @foreach ($options as $item)
                    <tr>
                        <td><?= $index++ ?></td>
                        <td>{{$item->name}}</td>
                        <td>
                            @if ($item->display_types == 0)
                            <span>Name</span>
                            @else
                            <span>Color</span>
                            @endif
                        </td>
                        <td>
                            <ul>
                                @foreach ($item->optionDetail as $pro)
                                <li>{{$pro->name}}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                <a href="{{route('product.propertieDetail' ,  $item->id)}}" class="dropdown-item btn btn-outline-info"
                                        href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Detail</a>
                                    <a href="" class="dropdown-item btn btn-outline-warning"
                                        href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a href="{{route('product.propertieDelete' , $item->id)}}" id="showToastPlacement"
                                        onclick="return confirm('Do you want to delete this data?')"
                                        id="showToastPlacement" class="dropdown-item btn btn-outline-danger"><i
                                            class="bx bx-trash me-1"></i>
                                        Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="my-4">
                {{ $options->appends(request()->all())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection