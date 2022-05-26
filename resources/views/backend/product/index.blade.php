@extends('backend.layouts.master')
@section('title', 'All products')
@push('css')

@endpush
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-5 col-md-8 col-sm-12">
            <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                        class="fa fa-arrow-left"></i></a>All products</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item">Product</li>
                <li class="breadcrumb-item active">All products</li>
            </ul>

        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @include('backend.layouts.notification')
    </div>
    <div class="col-md-6 py-2">
        <a href="{{route('product.create')}}" class="btn btn-info mb-3" style="padding: 5px 20px; margin-bottom:0px!important"> <i class="fa fa-plus-circle mr-2"></i> Add product </a>
        <span id="product_count" class="badge badge-success" style="padding: 10px 20px;">Total products: {{$products->count()}}</span>

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
                                <th>Photo</th>
                                <th>Price</th>
                                <th>Disc</th>
                                <th>Offer price</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Condition</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                          @foreach ($products as $key=>$item)
                            @php
                                $photo=explode(',', $item->photo);
        //if there is multiple images of a product, explode will break them by comma and make an array inside $photo
                            @endphp

                              <tr id="row{{$item->id}}">
                                  <td>{{$key+1}}</td>
                                  <td>{{Str::limit($item->title, 10,)}}</td>
                                  <td><img src="{{$photo[0]}}" width="100px" height="60px" alt=""></td>
                                  <td>{{number_format($item->price,2)}} Tk</td>
                                  <td>{{$item->discount}}%</td>
                                  <td>{{number_format($item->offer_price,2)}} Tk</td>
                                  <td>{{$item->stock}}</td>
                                  <td>
                                    <input type="checkbox" name="toogle" value="{{$item->id}}" {{$item->status=='active'? 'checked' : ''}} data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger">
                                  </td>
                                  <td>
                                      @if ($item->condition=='new')
                                             <span class="badge badge-success">{{$item->condition}}</span>
                                        @elseif($item->condition=='popular')
                                            <span class="badge badge-warning">{{$item->condition}}</span>
                                        @elseif($item->condition=='sale')
                                             <span class="badge badge-danger">{{$item->condition}}</span>
                                        @else
                                             <span class="badge badge-info">{{$item->condition}}</span>
                                      @endif

                                    </td>

                                  <td>
                                      <a  title="View" class="btn btn-sm btn-outline-info" data-placement="bottom" data-toggle="modal" data-target="#product_view{{$item->id}}"><i class="fa fa-eye"></i></a>
                                      <a  href="{{route('product.edit', $item->id)}}" data-toggle="tooltip" title="Edit" class="btn btn-sm btn-outline-warning" data-placement="bottom"><i class="fa fa-edit"></i></a>
                                      <a  href="javascript:void(0);" data-id="{{$item->id}}"  data-toggle="tooltip" title="Delete" class="delete_btn btn btn-sm btn-outline-danger" data-placement="bottom"><i class="fa fa-trash"></i></a>

                                  </td>

                                   <!-------------------------------------- Modal -------------------------------------->

                                <div class="modal fade" id="product_view{{$item->id}}" data-id={{$item->id}}  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            @php
                                                $product=\App\Models\Product::where('id', $item->id)->first();
                                            @endphp

                                        <h5 class="modal-title" id="exampleModalLabel">{{Str::upper($product->title)}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <strong>Summary: </strong>
                                                    <p> {{strip_tags($product->summary)}}</p>


                                                    <strong>Description: </strong>
                                                    @if ($item->description != '')
                                                      <p>  {{strip_tags($product->description)}}</p>
                                                        @else
                                                        <p>Sorry, this product has no description... </p>
                                                    @endif


                                                </div>
                                                <div class="col-md-6">
                                                    <img src="{{$photo[0]}}" width="150px"  height="150px" alt="">
                                                </div>
                                            </div>
                                            <div class="row my-3" >
                                                <div class="col-md-6">
                                                    <strong>Price: </strong>
                                                    <span id="price">{{$product->price}} </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Discount: </strong>
                                                    <span>{{$product->discount}} </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Offer Price: </strong>
                                                    <span>{{$product->offer_price}} </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Stocks: </strong>
                                                    <span>{{$product->stock}} </span>
                                                </div>

                                                <div class="col-md-6">
                                                    <strong>Size: </strong>
                                                    <span class="badge badge-pill badge-primary"> {{$product->size}} </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Status: </strong>
                                                    @if ($product->status=='active')
                                                        <span id="status{{$product->id}}" class="badge badge-success">{{$product->status}} </span>
                                                        @else
                                                        <span id="status{{$product->id}}" class="badge badge-danger">{{$product->status}} </span>
                                                    @endif

                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Condition: </strong>
                                                    @if ($product->condition=='new')
                                                    <span class="badge badge-success">{{$product->condition}}</span>
                                                    @elseif($product->condition=='popular')
                                                        <span class="badge badge-warning">{{$product->condition}}</span>
                                                    @elseif($product->condition=='sale')
                                                            <span class="badge badge-danger">{{$product->condition}}</span>
                                                    @else
                                                            <span class="badge badge-info">{{$product->condition}}</span>
                                                    @endif
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Brand name: </strong>
                                                   <span>{{\App\Models\Brand::where('id', $product->brand_id)->value('title')}}</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Main category: </strong>
                                                    <span>{{\App\Models\Category::where('id', $product->parent_category_id)->value('title')}}</span>
                                                </div>

                                                <div class="col-md-6">
                                                    <strong>Sub category: </strong>
                                                    <span>{{\App\Models\Category::where('id', $product->child_category_id)->value('title')}}</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Vendor name: </strong>
                                                    <span>{{\App\Models\User::where('id', $product->vendor_id)->value('full_name')}}</span>
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
            url:"{{route('product.status')}}",
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
            url:"{{route('product.delete')}}",
            type:"POST",
            data:{
                id:dataID,
            },
            success:function(response){
               if(response.process){
                    $('#row'+dataID).remove();
                    $('#product_count').html('Total product: '+response.product_count);
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
            url:"{{route('product.updatedStatus')}}",
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
