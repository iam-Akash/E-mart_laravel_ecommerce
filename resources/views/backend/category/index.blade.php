@extends('backend.layouts.master')
@section('title', 'All categories')
@push('css')

@endpush
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-5 col-md-8 col-sm-12">
            <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                        class="fa fa-arrow-left"></i></a>All categories</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item">categories</li>
                
            </ul>
           
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @include('backend.layouts.notification')
    </div>
    <div class="col-md-6 py-2">
        <a href="{{route('category.create')}}" class="btn btn-info mb-3" style="padding: 5px 20px; margin-bottom:0px!important"> <i class="fa fa-plus-circle mr-2"></i> Add category </a>
        <span id="category_count" class="badge badge-success" style="padding: 10px 20px;">Total categories: {{$categories->count()}}</span>
       
    </div>
    <div class="col-lg-12">
        <div class="card">
            
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                {{-- <th>Summary</th> --}}
                                <th>photo</th>
                                <th>Is_parent</th>
                                <th>Parent</th>
                                <th>Status</th>
                                {{-- <th>Created at</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                       
                        <tbody>
                          @foreach ($categories as $key=>$item)
                              <tr id="row{{$item->id}}">
                                  <td>{{$key+1}}</td>
                                  <td>{{$item->title}}</td>
                                  {{-- <td>{!!Str::limit($item->summary, 20, $end='...')!!}</td> --}}
                                  <td><img src="{{$item->photo}}" width="120px" height="auto" alt=""></td>
                                  @if ($item->is_parent === 1)
                                        <td>Yes</td>
                                        <td>Itself</td>
                                      @else
                                        <td>No</td>
                                        <td>{{\App\Models\Category::find($item->parent_id)->title}}</td>
                                  @endif
                                 
                                  <td>
                                      
                                    <input type="checkbox" name="toogle" value="{{$item->id}}" {{$item->status=='active'? 'checked' : ''}} data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger">
                                      
                                  </td>
                                
                                  {{-- <td>{{$item->created_at->toFormattedDateString()}}</td> --}}
                                  <td>
                                      <a  href="{{route('category.edit', $item->id)}}" data-toggle="tooltip" title="Edit" class="btn btn-sm btn-outline-warning" data-placement="bottom"><i class="fa fa-edit"></i></a>
                                      <a  href="javascript:void(0);" data-id="{{$item->id}}"  data-toggle="tooltip" title="Delete" class="delete_btn btn btn-sm btn-outline-danger" data-placement="bottom"><i class="fa fa-trash"></i></a>
                                    
                                  </td>

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
            url:"{{route('category.status')}}",
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
                //    setTimeout(function() { alert(response.msg); }, 1000);
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
            url:"{{route('category.delete')}}",
            type:"POST",
            data:{
                id:dataID,
            },
            success:function(response){
               if(response.process){
                    $('#row'+dataID).remove();
                    $('#category_count').html('Total categories: '+response.category_count);
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

@endpush
