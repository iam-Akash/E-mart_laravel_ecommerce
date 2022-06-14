@foreach ($products as $item)
<!-- Single Product -->
@php
$photo = explode(',', $item->photo);
@endphp

<div class="col-9 col-sm-6 col-md-4 col-lg-3">
    <div class="single-product-area mb-30">
        <div class="product_image">
            <!-- Product Image -->
            <img class="normal_img" src="{{$photo[0]}}" alt="">


            <!-- Product Badge -->
            <div class="product_badge">
                <span>{{$item->condition}}</span>
            </div>

            <!-- Wishlist -->
            <div class="product_wishlist">
                <a href="wishlist.html"><i class="icofont-heart"></i></a>
            </div>

            <!-- Compare -->
            <div class="product_compare">
                <a href="compare.html"><i class="icofont-exchange"></i></a>
            </div>
        </div>

        <!-- Product Description -->
        <div class="product_description">
            <!-- Add to cart -->
            <div class="product_add_to_cart">
                <a href="#"><i class="icofont-shopping-cart"></i> Add to Cart</a>
            </div>

            <!-- Quick View -->
            <div class="product_quick_view">
                <a href="#" data-toggle="modal" data-target="#quickview"><i class="icofont-eye-alt"></i> Quick View</a>
            </div>

            <p class="brand_name">{{Str::upper($item->brand->title)}}</p>
            <a href="{{route('product.details', $item->slug)}}">{{Str::ucfirst($item->title) }}</a>
            @if ($item->discount>0)
            <h6 class="product-price">{{$item->offer_price}} Taka <span>{{$item->price}} Taka</span></h6>

            @else
            <h6 class="product-price">{{$item->price}} Taka</h6>
            @endif

        </div>
    </div>
</div>
@endforeach