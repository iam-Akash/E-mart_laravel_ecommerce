@extends('backend.layouts.master')
@section('title', 'Add-product')
@push('css')
<style>
    .custom_input {
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
                        class="fa fa-arrow-left"></i></a>Add product</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item">Product</li>
                <li class="breadcrumb-item active">Create product</li>
            </ul>
        </div>

    </div>
</div>
<div class="row clearfix">
    <div class="col-md-12">
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
                <form id="basic-form" method="post" action="{{route('product.store')}}">
                    @csrf
                    <div class="form-group">
                        <label>Product title<span class="text-danger">*</span></label>
                        <input type="text" name='title' value="{{old('title')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Product summary<span class="text-danger">*</span></label>
                        <textarea id="summary" placeholder="Write some text..." class="form-control"  name="summary" rows="5"
                            cols="30">{{old('summary')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Product description</label>
                        <textarea id="description" placeholder="Write some text..." class="form-control"  name="description" rows="15"
                            cols="30">{{old('description')}}</textarea>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status">Price<span class="text-danger">*</span></label>
                                <br>
                                <input type="number" class="custom_input" step="any" name="price" placeholder="Price (eg. 1000)" value="{{old('price')}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status">Discount</label>
                                <br>
                                <input type="number" class="custom_input" min="0" max="100" placeholder="Discount (eg. 41)"  name="discount" value="{{old('discount')}}">

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status">Stocks<span class="text-danger">*</span></label>
                                <br>
                                <input type="number" class="custom_input" placeholder="Stock (eg. 10)" name="stock" value="{{old('stock')}}">

                            </div>
                        </div>

                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="status">Available sizes</label>
                                <br>
                                <select id="size" class="custom_input size" name="size" >
                                    <option value="" selected>--select--</option>
                                    <option value="xs" {{old('status')=='xs'? 'selected' : ''}}>XS</option>
                                    <option value="xs" {{old('status')=='xs'? 'selected' : ''}}>S</option>
                                    <option value="xs" {{old('status')=='xs'? 'selected' : ''}}>M</option>
                                    <option value="xs" {{old('status')=='xs'? 'selected' : ''}}>L</option>
                                    <option value="xs" {{old('status')=='xs'? 'selected' : ''}}>XL</option>
                                    <option value="xs" {{old('status')=='xs'? 'selected' : ''}}>XXL</option>

                                    </option>
                                </select>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="status">Brand</label>
                                <br>
                                <select id="brand" class="custom_input brand" name="brand">
                                    <option value="" selected>--select--</option>

                                    @foreach (\App\Models\Brand::all() as $brand)
                                    <option value="{{$brand->id}}">{{$brand->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="status">Main Category</label>
                                <br>
                                <select id="parent_category" class="custom_input parent_category" name="parent_category">
                                    <option value="" selected>--select--</option>
                                    @foreach (\App\Models\Category::where('is_parent', 1)->get() as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div id="child_category_div" class="col-md-12 d-none">
                            <div class="form-group">
                                <label for="status">Sub Category</label>
                                <br>
                                <select id="child_category" class="custom_input child_category" name="child_category">


                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Product status</label>
                                <br>
                                <select id="status" class="custom_input status" name="status">
                                    <option value="active" {{old('status')=='active'? 'selected' : ''}}>Active</option>
                                    <option value="inactive" {{old('status')=='inactive'? 'selected' : ''}}>Inactive
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="condition">Product condition</label>
                                <br>
                                <select id="condition" class="custom_input condition" name="condition">
                                    <option value="new" {{old('condition')=='new'? 'selected' : ''}}>New
                                    </option>
                                    <option value="popular" {{old('condition')=='popular'? 'selected' : ''}}>Popular
                                    </option>
                                    <option value="sale" {{old('condition')=='sale'? 'selected' : ''}}>Sale
                                    </option>
                                    <option value="winter" {{old('condition')=='winter'? 'selected' : ''}}>Winter
                                    </option>
                                </select>
                            </div>
                        </div>


                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <label for="status">Upload product image<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                                <input id="thumbnail" class="form-control" type="text" name="photo">
                            </div>
                            <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                        </div>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
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
        $('#description').summernote({
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
            height: 100,
            placeholder: 'Write some text...',
        });
    });

</script>
<script>

    $('#parent_category').change(function (e) {
        e.preventDefault();
        var parent_cat_id = $(this).val();

        if(parent_cat_id!=""){
            $.ajax({
            url: "getChildCategory/"+parent_cat_id+"/child",
            type: "GET",
            success: function (response) {
                var child_option="<option value=''>--Select</option>";
                if(response.process){
                    $("#child_category_div").removeClass('d-none');
                    $.each(response.data, function(id,title){
                        child_option += "<option>title</option>";

                    });
                    }
                    else{
                        alert(response.msg);
                    }
                    $('#child_category').html(child_option);
            }
        });
        }
        else{
            $("#child_category_div").addClass('d-none');
        }


            });
</script>


@endpush


{{--
    url: "{{route('product.getChildCategory')}}",
     type: "GET",
    data: {
    _token:'{{csrf_token()}}',
    id: parent_cat_id,
}, --}}
{{--
if(parent_cat_id != ""){

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    $.ajax({
    url: "getChildCategory/"+parent_cat_id+"/child",
    type: "GET",
    success: function (response) {
        if(response.process){
            console.log(response.data);
            var child_category_option= "<option value="" selected>--Select--</option>";

        }
        else{
            alert(response.msg);
        }
    }
});
} --}}


