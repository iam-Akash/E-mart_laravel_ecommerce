@extends('backend.layouts.master')
@section('title', 'All users')
@push('css')

@endpush
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-5 col-md-8 col-sm-12">
            <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                        class="fa fa-arrow-left"></i></a>All users</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item">User</li>
                <li class="breadcrumb-item active">All users</li>
            </ul>

        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @include('backend.layouts.notification')
    </div>
    <div class="col-md-6 py-2">
        <a href="{{route('user.create')}}" class="btn btn-info mb-3" style="padding: 5px 20px; margin-bottom:0px!important"> <i class="fa fa-plus-circle mr-2"></i> Add user </a>
        <span id="user_count" class="badge badge-success" style="padding: 10px 20px;">Total users: {{$users->count()}}</span>

    </div>
    <div class="col-lg-12">
        <div class="card">

            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Full name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                          @foreach ($users as $key=>$user)
                            @php
                                $photo=explode(',', $user->photo);
        //if there is multiple images of a user, explode will break them by comma and make an array inside $photo
                            @endphp

                              <tr id="row{{$user->id}}">
                                  <td>{{$key+1}}</td>
                                  <td><img style="border-radius:50%;" src="{{$photo[0]}}" width="100px" height="100px" alt=""></td>
                                  <td>{{$user->full_name}}</td>
                                  <td>{{$user->email}}</td>
                                  <td>{{$user->role}}</td>
                                  <td>
                                    <input type="checkbox" name="toogle" value="{{$user->id}}" {{$user->status=='active'? 'checked' : ''}} data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger">
                                  </td>


                                  <td>
                                      <a  title="View" class="btn btn-sm btn-outline-info" data-placement="bottom" data-toggle="modal" data-target="#user_view{{$user->id}}"><i class="fa fa-eye"></i></a>
                                      <a  href="{{route('user.edit', $user->id)}}" data-toggle="tooltip" title="Edit" class="btn btn-sm btn-outline-warning" data-placement="bottom"><i class="fa fa-edit"></i></a>
                                      <a  href="javascript:void(0);" data-id="{{$user->id}}"  data-toggle="tooltip" title="Delete" class="delete_btn btn btn-sm btn-outline-danger" data-placement="bottom"><i class="fa fa-trash"></i></a>

                                  </td>

                                   <!-------------------------------------- Modal -------------------------------------->

                                <div class="modal fade" id="user_view{{$user->id}}" data-id={{$user->id}}  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{Str::upper($user->full_name)}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <img style="display: block;margin:0 auto;border-radius:50%;" src="{{$photo[0]}}" width="150px"  height="150px" alt="">
                                                </div>
                                            </div>
                                            <div class="row my-5" >
                                                <div class="col-md-6">
                                                    <strong>Full name: </strong>
                                                    <span>{{$user->full_name}} </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Email: </strong>
                                                    <span>{{$user->email}} </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Phone: </strong>
                                                    <span>{{$user->phone}} </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Role: </strong>
                                                    <span>{{$user->role}} </span>
                                                </div>

                                                <div class="col-md-6">
                                                    <strong>Address: </strong>
                                                    <address > {{$user->address}} </address>
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Status: </strong>
                                                    @if ($user->status=='active')
                                                        <span id="status{{$user->id}}" class="badge badge-success">{{$user->status}} </span>
                                                        @else
                                                        <span id="status{{$user->id}}" class="badge badge-danger">{{$user->status}} </span>
                                                    @endif

                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Created at: </strong>
                                                    <span>{{$user->created_at->toFormattedDateString()}}</span>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                    </div>
                                </div>
                              </tr>

                          @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('js')
<script>
    $('input[name=toogle').change(function(){
        var mode=$(this).prop('checked');
        var id=$(this).val();

        $.ajax({
            url:"{{route('user.status')}}",
            type:"POST",
            data:{
               _token:'{{csrf_token()}}',
                mode:mode,
                id:id,
            },
            success:function(response){
               if(response.process){

                Swal.fire(
                    response.status,
                    response.msg,
                    'success'
                    )
               }
               else{
                   alert('Please try again');
               }
            }
        });
    })
</script>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $('.delete_btn').click(function (e) {
        e.preventDefault();
        var dataID=$(this).data('id');
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
            url:"{{route('user.delete')}}",
            type:"POST",
            data:{
                id:dataID,
            },
            success:function(response){
               if(response.process){
                    $('#row'+dataID).remove();
                    $('#user_count').html('Total sers: '+response.user_count);
                   Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
               }
               else{
                alert(response.error);
               }

            }
        });

        }
        });
    });
</script>
<script>

    $(".modal").on("shown.bs.modal", function(e){
        var item_id= $(this).data('id');
        var present_status= $('#status'+item_id).html();

        $.ajax({
            url:"{{route('user.updatedStatus')}}",
            type:"POST",
            data:{
               _token:'{{csrf_token()}}',
                id:item_id,
            },
            success:function(response){
               if(response.process){
                $('#status'+item_id).html(response.data);
                if(present_status='active' && response.data=='inactive'){
                    $('#status'+item_id).removeClass('badge-success');
                    $('#status'+item_id).addClass('badge-danger');
                }
                if(present_status='inactive' && response.data=='active'){
                    $('#status'+item_id).removeClass('badge-danger');
                    $('#status'+item_id).addClass('badge-success');
                }
               }
            }
});
});

</script>

@endpush
