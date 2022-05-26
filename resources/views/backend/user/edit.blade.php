@extends('backend.layouts.master')
@section('title', 'Edit-user')
@push('css')
<style>
     .status,
    .parent_id,
    .role {
        width: 100%;
        padding-top: 5px;
        padding-bottom: 5px;
    }
    .dropdown-toggle::after{
        display: none;
    }

</style>
@endpush
@section('content')

<div class="block-header">
    <div class="row">
        <div class="col-lg-5 col-md-8 col-sm-12">
            <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                        class="fa fa-arrow-left"></i></a>Edit user</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item">User</li>
                <li class="breadcrumb-item active">Edit user</li>
            </ul>
        </div>

    </div>
</div>
<div class="row clearfix">

    <div class="col-md-12">
        @include('backend.layouts.notification')
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{$error}}</li>
                @endforeach
            </ul>

        @endif
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="body">
                <form id="basic-form" method="post" action="{{route('user.update', $user->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Full name<span class="text-danger">*</span></label>
                        <input type="text" placeholder="Full name" name='full_name' value="{{$user->full_name}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>User name<span class="text-danger">*</span></label>
                        <input type="text" placeholder="User name" name='username' value="{{$user->username}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email<span class="text-danger">*</span></label>
                        <input type="email" placeholder="Email" name='email' value="{{$user->email}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password<span class="text-danger">*</span></label>
                        <input type="password" placeholder="Minimum password 6 character" name='password' value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Confirm password<span class="text-danger">*</span></label>
                        <input type="password" placeholder="Re-type password" name='password_confirmation' value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="number" placeholder="Phone" name='phone' value="{{$user->phone}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" placeholder="Address" name='address' value="{{$user->address}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Role<span class="text-danger">*</span></label>
                        <br>
                        <select class="role" name="role">
                            <option value="" selected>--select--</option>
                            <option value="admin" {{$user->role=='admin'? 'selected':''}}>Admin</option>
                            <option value="vendor" {{$user->role=='vendor'? 'selected':''}}>Vendor</option>
                            <option value="customer" {{$user->role=='customer'? 'selected':''}}>Customer</option>
                        </select>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="status">User status<span class="text-danger">*</span></label>
                                <br>
                                <select id="status" class="status" name="status">
                                    <option value="active" {{$user->status=='active'? 'selected' : ''}}>Active</option>
                                    <option value="inactive" {{$user->status=='inactive'? 'selected' : ''}}>Inactive
                                    </option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <label >Upload user image<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                                <input id="thumbnail" class="form-control" value="{{$user->photo}}" type="text" name="photo">
                            </div>
                            <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{route('user.index')}}" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<Script>
    $('#lfm').filemanager('image');

</Script>
<script>
    $(document).ready(function () {
        $('#summary').summernote({
            toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['fontname', ['fontname']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['help']],
                    ],
            disableDragAndDrop: true,
            height: 150,
            placeholder: 'Write some text...',
        });
    });

</script>



@endpush
