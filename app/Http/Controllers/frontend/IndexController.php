<?php

namespace App\Http\Controllers\frontend;

use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
   public function home(){
    $banners=Banner::ActiveBanners()->take(4)->latest()->get();
    $categories= Category::ActiveCategories()->take(3)->orderBy('id', 'desc')->get();
    return view('frontend.homepage', ['banners'=>$banners, 'categories'=>$categories]);
   }

   public function productCategory($slug){
     $category = Category::where('slug', $slug)->first();
     return view('frontend.pages.product-category', ['category'=>$category]);
   }

}
