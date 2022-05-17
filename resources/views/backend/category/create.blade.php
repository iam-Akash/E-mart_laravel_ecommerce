@extends('backend.layouts.master')
@section('title', 'Add-category')
@push('css')
<style>
     .status,
    .parent_id {
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
                        class="fa fa-arrow-left"></i></a>Add category</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item">Category</li>
                <li class="breadcrumb-item active">Create category</li>
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
                <form id="basic-form" method="post" action="{{route('category.store')}}">
                    @csrf
                    <div class="form-group">
                        <label>Title<span class="text-danger">*</span></label>
                        <input type="text" name='title' value="{{old('title')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Summary</label>
                        <textarea id="summary" placeholder="Write some text..." class="form-control"  name="summary" rows="15"
                            cols="30">{{old('summary')}}</textarea>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="is_parent">Is parent?</label>
                                <br>
                                <input type="checkbox" value="1"  checked name="is_parent" id="is_parent">
                            </div>
                        </div>
                        <div class="col-md-6 d-none" id="parent_cat_div">
                            <div class="form-group">
                                <label for="parent_id">Parent category title</label>
                                <br>
                                <select id="parent_id" class="parent_id" name="parent_id">
                                    <option value="" selected>--Select--</option>
                                    @foreach ($parent_categories as $item)
                                    <option value="{{$item->id}}" {{old('parent_id')== $item->id? 'selected': ''}}>{{$item->title}}</option>
                                    @endforeach
                                    
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Category status</label>
                                <br>
                                <select id="status" class="status" name="status">
                                    <option value="active" {{old('status')=='active'? 'selected' : ''}}>Active</option>
                                    <option value="inactive" {{old('status')=='inactive'? 'selected' : ''}}>Inactive
                                    </option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <label for="status">Upload category image<span class="text-danger">*</span></label>
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

<script>
    $('#is_parent').change(function (e) { 
        e.preventDefault();
        
        var is_checked= $(this).prop('checked');
        if(is_checked){
        
            $('#parent_cat_div').addClass('d-none');
            $('#parent_id').val('');
        }
        else{
            
            $('#parent_cat_div').removeClass('d-none');
        }
        
    });
</script>

@endpush
