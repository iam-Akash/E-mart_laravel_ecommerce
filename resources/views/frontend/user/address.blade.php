@extends('frontend.layouts.master')
@section('title', 'address')

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
                    <div>
                        @if($errors->any())
                        @foreach ($errors->all() as $error)
                        <div style="color:red;">{{ $error}}*</div>
                        @endforeach
                        @endif
                    </div>
                    <p>The following addresses will be used on the checkout page by default.</p>

                    <div class="row">
                        <div class="col-12 col-lg-6 mb-5 mb-lg-0">
                            <h6 class="mb-3">Billing Address</h6>
                            @if (Auth::user()->address != null)
                                <address>
                                    {{Auth::user()->address}}<br>
                                    {{Auth::user()->city}} <br>
                                    {{Auth::user()->state}} <br>
                                    {{Auth::user()->postcode}}<br>
                                    {{Auth::user()->country}}
                                </address>
                                <a data-toggle="modal" data-target="#address" class="btn btn-primary btn-sm text-white">Edit Address</a>
                                @else
                                <address>You have not set up this type of address yet.</address>
                                <a data-toggle="modal" data-target="#address" class="btn btn-primary btn-sm text-white">Add Address</a>
                            @endif
                            
                        </div>
                       
                        
                        <!-- Address Modal -->
                        <div class="modal fade" id="address" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Your address</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('user.address.add', Auth::user()->id)}}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="address">Address<span style="color:red;">*</span></label>
                                            <textarea class="form-control" name="address" id="address" cols="30" rows="2" placeholder="eg. 34, Road no. 3, Arambagh">{{Auth::user()->address}}</textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="city">City<span style="color:red;">*</span></label>
                                            <input type="text" value="{{Auth::user()->city}}" class="form-control" name="city" id="city" aria-describedby="emailHelp"
                                                placeholder="eg. Dhaka">
                                        </div>
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <input type="text" value="{{Auth::user()->state}}" name="state" class="form-control" id="state" aria-describedby="emailHelp"
                                                placeholder="eg. alaska">
                                        </div>
                                        <div class="form-group">
                                            <label for="postcode">Postal code<span style="color:red;">*</span></label>
                                            <input type="text" value="{{Auth::user()->postcode}}" name="postcode" class="form-control" id="postcode" placeholder="eg. 1217">
                                        </div>
                                        <div class="form-group">
                                            <label for="country">Country<span style="color:red;">*</span></label>
                                            <input type="text" value="{{Auth::user()->country}}" name="country" class="form-control" id="country" placeholder="eg. Bangladesh">
                                        </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!---- End Modal-------->

                        <div class="col-12 col-lg-6">
                            <h6 class="mb-3">Shipping Address</h6>
                            @if (Auth::user()->ship_address)
                                <address>
                                    {{Auth::user()->ship_address}}<br>
                                    {{Auth::user()->ship_city}} <br>
                                    {{Auth::user()->ship_state}} <br>
                                    {{Auth::user()->ship_postcode}}<br>
                                    {{Auth::user()->ship_country}}
                                </address>
                                <a data-toggle="modal" data-target="#shipping_address" class="btn btn-primary btn-sm text-white">Edit Ship Address</a>
                                @else
                                <address>
                                    You have not set up this type of address yet.
                                </address>
                                <a data-toggle="modal" data-target="#shipping_address" class="btn btn-primary btn-sm text-white">Add shipping
                                    address</a>
                            @endif
                           
                        </div>
                        <!-- Shipping address Modal -->
                        <div class="modal fade" id="shipping_address" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Your shipping address</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('user.shippingAddress.add', Auth::user()->id)}}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="address">Shipping Address</label>
                                                <textarea class="form-control" name="ship_address" id="address" cols="30" rows="2"
                                                    placeholder="eg. 34, Road no. 3, Arambagh">{{Auth::user()->ship_address}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="city">Shipping City</label>
                                                <input value="{{Auth::user()->ship_city}}" type="text" class="form-control" name="ship_city" id="city" aria-describedby="emailHelp"
                                                    placeholder="eg. Dhaka">
                                            </div>
                                            <div class="form-group">
                                                <label for="state">Shipping State</label>
                                            <div class="form-group">
                                                <input type="text" value="{{Auth::user()->ship_state}}" name="ship_state" class="form-control" id="state" aria-describedby="emailHelp"
                                                    placeholder="eg. alaska">
                                            </div>
                                            <div class="form-group">
                                                <label for="postalCode">Shipping Postal code</label>
                                                <input type="text" value="{{Auth::user()->ship_postcode}}" name="ship_postcode" class="form-control" id="postalCode"
                                                    placeholder="eg. 1217">
                                            </div>
                                            <div class="form-group">
                                                <label for="postalCode">Shipping country</label>
                                                <input type="text" value="{{Auth::user()->ship_country}}" name="ship_country" class="form-control" id="postalCode" placeholder="eg. Bangladesh">
                                            </div>
                        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!---- End Modal-------->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- My Account Area -->
@endsection
@push('js')
<script>
    $('.modal').appendTo("body")
</script>
@endpush