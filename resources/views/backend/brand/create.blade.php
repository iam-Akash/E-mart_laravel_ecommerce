@extends('backend.layouts.master')
@section('title', 'Create-brand')
@push('css')
<style>
    .status,
    .condition {
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
                        class="fa fa-arrow-left"></i></a>Create brand</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item">Brand</li>
                <li class="breadcrumb-item active">Create brand</li>
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
                <form id="basic-form" method="post" action="{{route('brand.store')}}">
                    @csrf
                    <div class="form-group">
                        <label>Title<span class="text-danger">*</span></label>
                        <input type="text" name='title' value="{{old('title')}}" class="form-control">
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Brand status</label>
                                <br>
                                <select id="status" class="status" name="status">
                                    <option value="" selected>--select--</option>
                                    <option value="active" {{old('status')=='active'? 'selected' : ''}}>Active</option>
                                    <option value="inactive" {{old('status')=='inactive'? 'selected' : ''}}>Inactive
                                    </option>
                                </select>
                            </div>
                        </div>


                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <label >Upload brand image</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                                <input id="thumbnail" class="form-control" type="text" name="photo" value="{{old('photo')}}">
                            </div>
                            <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('brand.index')}}"  class="btn btn-danger">Cancel</a>
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
    });

</script>

@endpush
