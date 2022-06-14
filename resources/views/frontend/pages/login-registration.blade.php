@extends('frontend.layouts.master')
@section('title', 'Login & Registration')

@push('css')
<style>
.breadcumb_area{
    height:100px;
    }
.section_padding_100_50{
    padding-top: 30px;
}
</style>

@endpush
@section('content')
    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Login &amp; Register</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Login &amp; Register</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->
    
    <!-- Login Area -->
    <div class="bigshop_reg_log_area section_padding_100_50">
        <div class="container">
            @include('frontend.layouts.notification')
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="login_form mb-50">
                        <h5 class="mb-3">Login</h5>
                       
                        <form action="{{route('user.authentication')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                            </div>
                            @error('email')
                                <p style="color: red"> {{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <input type="password" class="form-control"  name="password" id="password" placeholder="Password">
                            </div>
                            @error('password')
                            <p style="color: red"> {{$message}}</p>
                            @enderror
                            <div class="form-check">
                                <div class="custom-control custom-checkbox mb-3 pl-1">
                                    <input type="checkbox" class="custom-control-input" id="customChe">
                                    <label class="custom-control-label" for="customChe">Remember me for this
                                        computer</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Login</button>
                        </form>
                        <!-- Forget Password -->
                        <div class="forget_pass mt-15">
                            <a href="#">Forget Password?</a>
                        </div>
                    </div>
                </div>
    
                <div class="col-12 col-md-6">
                    <div class="login_form mb-50">
                        <h5 class="mb-3">Register</h5>
    
                        <form action="{{route('user.registration')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="reg_full_name" id="username" value='{{old('reg_full_name')}}' placeholder="Full Name">
                            </div>
                            @error('reg_full_name')
                            <p style="color: red"> {{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <input type="email" name="reg_email" class="form-control" value='{{old('reg_email')}}' id="username" placeholder="Email">
                            </div>
                            @error('reg_email')
                            <p style="color: red"> {{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <input type="password" name="reg_password" class="form-control" value='{{old('reg_password')}}' id="password" placeholder="Password">
                            </div>
                            @error('reg_password')
                            <p style="color: red"> {{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <input type="password" name= "reg_password_confirm" value='{{old('reg_password_confirm')}}' class="form-control" id="password" placeholder="Repeat Password">
                            </div>
                            @error('reg_password_confirm')
                            <p style="color: red"> {{$message}}</p>
                            @enderror
                            <button type="submit" class="btn btn-primary btn-sm">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Area End -->
@endsection
@push('js')

@endpush