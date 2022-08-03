@extends('admin.layout.main')
@section('title' , 'Danh mục phòng')
@section('content')
<div class="container">
    <h3 class="my-3">Danh mục phòng</h3>
    <div class="row">
        <div class="col-5">
            @if(!isset($roomDetail))
            <form method="POST" action="{{route('room.create')}}">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tên phòng</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Tên phòng">
                </div>
                <button type="submit" class="btn btn-primary">Thêm phòng</button>
            </form>
            @else
            <form method="POST" action="{{route('room.update' , $roomDetail)}}">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tên phòng</label>
                    <input type="text" name="name" value="{{$roomDetail->name}}" class="form-control" id="exampleFormControlInput1" placeholder="Tên phòng">
                </div>
                <button type="submit" class="btn btn-warning">Sua phòng</button>
            </form>
            @endif
        </div>
        <div class="col-7">
            <div class="">
                <table class="table">
                    <thead>
                        <tr class="text-nowrap">
                            <th>Id</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach (  $rooms as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="{{route('room.edit' , $item->id)}}" class="dropdown-item btn btn-outline-warning" href="javascript:void(0);"><i
                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a href="{{route('room.delete' , $item->id)}}" id="showToastPlacement"
                                            onclick="return confirm('Do you want to delete this data?')"
                                            class="dropdown-item btn btn-outline-danger"><i
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
                    {{ $rooms->appends(request()->all())->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection