@extends('backend.layouts.master')
@section('title', 'All banners')
@push('css')

@endpush
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-5 col-md-8 col-sm-12">
            <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                        class="fa fa-arrow-left"></i></a>All banner</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item">Banner</li>
                <li class="breadcrumb-item active">All banner</li>
            </ul>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @include('backend.layouts.notification')
    </div>
    <div class="col-md-6">
        <a href="{{route('banner.create')}}" class="btn btn-info mb-3" style="padding: 5px 20px">Add banner </a>
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
                                <th>Slug</th>
                                <th>Description</th>
                                <th>photo</th>
                                <th>Status</th>
                                <th>Condition</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                       
                        <tbody>
                          @foreach ($banners as $key=>$banner)
                              <tr>
                                  <td>{{$key+1}}</td>
                                  <td>{{$banner->title}}</td>
                                  <td>{{$banner->slug}}</td>
                                  <td>{{Str::limit($banner->description, 20, $end='...')}}</td>
                                  <td><img src="{{$banner->photo}}" width="120px" height="auto" alt=""></td>
                                  <td>{{$banner->status}}</td>
                                  <td>{{$banner->condition}}</td>
                                  <td>{{$banner->created_at->toFormattedDateString()}}</td>
                                  <td>
                                      <a  href="javascript:void();">Edit</a>
                                      <br>
                                      <a   href="javascript:void();">Delete</a>
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

@endpush
