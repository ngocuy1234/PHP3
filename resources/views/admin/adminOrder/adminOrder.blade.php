@extends('admin.layout.main')
@section('title' , 'Admin Order')
@section('content')
<div class="container">
    <div class="d-flex  justify-content-between align-item-center">
        <h3 class="my-3">Admin Order </h3>
        <button class="btn btn-info back text-white mt-2">Refest</button>
    </div>
    <h3 id="result"></h3>
    <table class="table">
        <thead>
            <tr class="text-nowrap">
                <th>Id</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Money</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($orders as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td><a href="{{route('order.detail' , $item->id)}}">{{$item->name}}</a></td>
                <td>{{$item->phone}}</td>
                <td>{{$item->address}}</td>
                <td></td>
                <td>{{$item->created_at->format('H:i d/m/Y')}}</td>
                <td>
                    @if ($item->status == 0)
                    <span  class="bg-info p-1 rounded text-white">Waiting</span>
                    @elseif ($item->status == 2)
                    <span   class="bg-danger p-1 rounded text-white">Canceled</span>
                    @elseif ($item->status == 3)
                    <span  class="bg-success p-1 rounded text-white">Received</span>
                    @else
                    <span  class="bg-primary  p-1 rounded text-white">Delivery</span>
                    @endif
                </td>
                <td>
                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a href="{{route('order.delete' , $item->id)}}" id="showToastPlacement"
                                onclick="return confirm('Do you want to delete this data?')"
                                class="dropdown-item btn btn-outline-danger"><i class="bx bx-trash me-1"></i>
                                Delete</a>
                        </div>
                    </div>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
    <div class="my-4 float-end">
        {{ $orders->appends(request()->all())->links('pagination::bootstrap-4') }}
    </div>
    @endsection
    @section('script')


    @endsection