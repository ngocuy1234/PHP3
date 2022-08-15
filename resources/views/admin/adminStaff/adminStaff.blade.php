@extends('admin.layout.main')
@section('title' , 'Admin Staff')
@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="">
            <h5 class="card-header">Table Staff</h5>
            <!-- <button class="btn btn-primary"></button> -->
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="text-nowrap">
                        <th>Id</th>
                        
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($staff as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td> <img width="40px" src="{{$item->avatar}}" alt="Avatar" class="rounded-circle" /></td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>

                        <td>
                            <select class="form-select" data-id="{{$item->id}}" style="width:150px" aria-label="Default select example">
                                <option @if ($item->role ==  0)
                                    selected
                                @endif value="0">Admin</option>
                                <option 
                                @if ($item->role ==  1)
                                    selected
                                @endif value="1">Superadmin</option>
                            </select>
                        </td>
                        <td>
                            @if ($item->status == 1)
                            <span class="badge bg-label-success me-1">Active</span>
                            @else
                            <span class="badge bg-label-danger me-1">Unactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item btn btn-outline-warning" href="javascript:void(0);"><i
                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a id="showToastPlacement"
                                        onclick="return confirm('Do you want to delete this data?')"
                                        class="dropdown-item btn btn-outline-danger"
                                        href="{{ route('staff.delete' , $item->id) }}"><i class="bx bx-trash me-1"></i>
                                        Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="my-4">
            {{ $staff->appends(request()->all())->links('pagination::bootstrap-4') }}
        </div>
        <div class="bs-toast toast toast-placement-ex m-2" role="alert" aria-live="assertive" aria-atomic="true"
            data-delay="2000">
            <div class="toast-header">
                <i class="bx bx-bell me-2"></i>
                <div class="me-auto fw-semibold">Bootstrap</div>
                <small>11 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">Fruitcake chocolate bar tootsie roll gummies gummies jelly beans cake.</div>
        </div>
    </div>
</div>
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="{{asset('js/alert-action.js')}}"></script>
<script>
    $(document).ready(function() {
    $('.form-select').on('change', function() {
        // alert($(this).data('id'));
        id = $(this).data('id');
        status = $(this).val();
        $.get("<?= route('staff.updateRole') ?>", {
            id: id,
            status: status
        }, function($data) {
            configAlert($data);
        })
    });
});
</script>
@endsection
@endsection