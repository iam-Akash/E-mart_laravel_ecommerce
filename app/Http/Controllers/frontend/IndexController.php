<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{
   public function home(){
    $banners=Banner::ActiveBanners()->take(4)->latest()->get();
    $categories= Category::ActiveCategories()->take(3)->orderBy('id', 'desc')->get();
    return view('frontend.homepage', ['banners'=>$banners, 'categories'=>$categories]);
   }

   public function productCategory(Request $request,$slug){
     $category = Category::where('slug', $slug)->first();
     $sort='';
     if($request->sort != null){
      $sort=$request->sort;
     }
     if($category== null){
      return view('errors.404');
     }
     else{
      if($sort=='priceAsc'){
        $products = Product::where(['status'=>'active', 'parent_category_id'=>$category->id])->orderBy('offer_price', 'Asc')->paginate(12);
      }
      elseif($sort=='priceDesc'){
        $products = Product::where(['status'=>'active', 'parent_category_id'=>$category->id])->orderBy('offer_price', 'Desc')->paginate(12);
      }
     
      elseif($sort=='titleAsc'){
        $products = Product::where(['status'=>'active', 'parent_category_id'=>$category->id])->orderBy('title', 'Asc')->paginate(12);
      }
      elseif($sort=='titleDesc'){
        $products = Product::where(['status'=>'active', 'parent_category_id'=>$category->id])->orderBy('title', 'Desc')->paginate(12);
      }
      elseif($sort=='discAsc'){
        $products = Product::where(['status'=>'active', 'parent_category_id'=>$category->id])->orderBy('discount', 'Asc')->paginate(12);
      }
      elseif($sort=='discDesc'){
        $products = Product::where(['status'=>'active', 'parent_category_id'=>$category->id])->orderBy('discount', 'Desc')->paginate(12);
      }
      else{
         $products = Product::where(['status'=>'active', 'parent_category_id'=>$category->id])->paginate(8);
      }
     }
     
     if($request->ajax()){
       //if ajax request true then new products will make view and append with old products.
       $view= view('frontend.pages.single-product', ['products'=>$products])->render();
       return response()->json(['html'=>$view]);
     }
     $route='product-category';
     return view('frontend.pages.product-category', ['category'=>$category, 'route'=>$route, 'products'=>$products]);
   }

   public function productDetails($slug){
    $product=Product::with('related_products')->where('slug', $slug)->first();
    return view('frontend.pages.product-details', ['product'=>$product]);
   }
   public function loginRegistration(){
     return view('frontend.pages.login-registration');
   }

   public function userAuthentication(Request $request){
    $this->validate($request, [
      'email'=> 'email|required|exists:users,email',
      'password'=>'required|min:6',
    ]);
    
    if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status'=>'active'])){
      $request->session()->put('user', $request->email);

      if(Session::get('url.intended')){
       return Redirect::to(Session::get('url.intended'));
      }
      else{
         return redirect()->route('homepage');
      }
     
    }
    else{
      return back()->with('error', 'login failed');
    }
   }
   public function userIndex(){
     return redirect()->route('homepage');
   }

   public function userRegistration(Request $request){
     $this->validate($request, [
      'reg_full_name'=> 'required|string',
      'reg_email'=>'required|email|unique:users,email',
      'reg_password'=> 'required|min:4',
      'reg_password_confirm'=> 'required|same:reg_password',
     ]);

     $data= $request->all();
     $check= $this->userStore($data);
     Session::put('user', $data['reg_email']);
     Auth::login($check);

     if($check){
       return redirect()->route('homepage')->with('success', 'successfully user registered');
     }
     else{
       return back()->with('error', 'Registration failed');
     }
 
   }
   private function userStore($data){
    $user= new User;
    $user->full_name= $data['reg_full_name'];
    $user->email= $data['reg_email'];
    $user->password= Hash::make($data['reg_password']);
    $user->save();
    return $user;
   }

   public function userLogout(){
     Session::forget('user');
     Auth::logout();
     return redirect()->route('homepage');
   }

}
