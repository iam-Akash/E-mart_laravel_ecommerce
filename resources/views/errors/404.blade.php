@extends('frontend.layouts.master')
@section('title', '404 error page')
    
@push('css')
    
@endpush
@section('content')
    <!-- Not Found Area -->
    <section class="error_page text-center section_padding_100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="not-found-text">
                        <h2>404</h2>
                        <h5 class="mb-3">Oops! Page Not Found</h5>
                        <p>Sorry! the page you looking for is not found. Make sure that you have typed the currect URL</p>
                        <a href="{{route('homepage')}}" class="btn btn-primary mt-3"><i class="fa fa-home" aria-hidden="true"></i> GO
                            HOME</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Not Found Area End -->
@endsection
@push('js')
    
@endpush