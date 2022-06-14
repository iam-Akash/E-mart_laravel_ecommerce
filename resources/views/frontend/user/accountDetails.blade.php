@extends('frontend.layouts.master')
@section('title', 'account-details')

@push('css')

@endpush
@section('content')
<!-- Breadcumb Area -->
<div class="breadcumb_area">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <h5>My Account</h5>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">My Account</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Breadcumb Area -->

<!-- My Account Area -->
<section class="my-account-area section_padding_100_50">
    <div class="container">
        @include('frontend.layouts.notification')
        <div class="row">
            <div class="col-12 col-lg-3">
               @include('frontend.user.sidebar')
            </div>
            <div class="col-12 col-lg-9">
                <div class="my-account-content mb-50">
                    <h5 class="mb-3">Account Details</h5>
                    <div class="my-2">
                        @if($errors->any())
                        @foreach ($errors->all() as $error)
                        <div style="color:red;">{{ $error}}*</div>
                        @endforeach
                        @endif
                    </div>
                    <form action="{{route('user.account.update', Auth::user()->id)}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="firstName">Full Name *</label>
                                    <input type="text" name="full_name" class="form-control" value="{{Auth::user()->full_name}}" id="firstName" placeholder="">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="lastName">User Name *</label>
                                    <input type="text" name="username" class="form-control" value="{{Auth::user()->username}}" id="lastName" placeholder="">
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="emailAddress">Email Address *</label>
                                    <input type="email" value="{{Auth::user()->email}}" class="form-control" id="emailAddress"
                                        placeholder="" disabled>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="phone">Phone *</label>
                                    <input type="telephone" name="phone" value="{{Auth::user()->phone}}" class="form-control" id="phone" placeholder="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="currentPass">Current Password (Leave blank to leave unchanged)</label>
                                    <input type="password" name="old_password" class="form-control" id="currentPass">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="newPass">New Password (Leave blank to leave unchanged)</label>
                                    <input type="password" name="new_password" class="form-control" id="newPass">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="confirmPass">Confirm New Password</label>
                                    <input type="password" name="new_password_confirm" class="form-control" id="confirmPass">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- My Account Area -->
@endsection
@push('js')

@endpush