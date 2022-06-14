<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\frontend\customerController;
use App\Http\Controllers\seller\sellerController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\frontend\IndexController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
    
//Frontend  section
Route::get('/', [IndexController::class, 'home'])->name('homepage');

//product category
Route::get('product-category/{slug}' , [IndexController::class, 'productCategory'])->name('product.category');
//product details
Route::get('product-details/{slug}' , [IndexController::class, 'productDetails'])->name('product.details');


//login and registration of user

    Route::get('Login-Registration', [IndexController::class, 'loginRegistration'])->name('user.login-registration');
    Route::post('user/login', [IndexController::class, 'userAuthentication'])->name('user.authentication');
    Route::post('user/registration', [IndexController::class, 'userRegistration'])->name('user.registration');
    Route::get('user/logout',  [IndexController::class, 'userLogout'])->name('user.logout');

    //user redirect
    Route::get('user', [IndexController::class, 'userIndex'])->name('customer');





//admin section+++++++
Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'admin']], function(){
    Route::get('', [AdminController::class, 'index'])->name('admin');

    //Banner
    Route::resource('banner', BannerController::class);
    Route::post('banner_status', [BannerController::class, 'bannerStatus'])->name('banner.status');
    Route::post('banner_delete', [BannerController::class, 'bannerDelete'])->name('banner.delete');

    //Category
    Route::resource('category', CategoryController::class );
    Route::post('category_status', [categoryController::class, 'categoryStatus'])->name('category.status');
    Route::post('category_delete', [categoryController::class, 'categoryDelete'])->name('category.delete');

    //Brand
    Route::resource('brand', BrandController::class);
    Route::post('brand_status', [brandController::class, 'brandStatus'])->name('brand.status');
    Route::post('brand_delete', [brandController::class, 'brandDelete'])->name('brand.delete');

    //Product
    Route::resource('product' , ProductController::class);
    Route::post('product_status', [productController::class, 'productStatus'])->name('product.status');
    Route::post('product_updatedStatus', [productController::class, 'updatedStatus'])->name('product.updatedStatus');
    Route::post('product_delete', [productController::class, 'productDelete'])->name('product.delete');
    Route::get('product/getChildCategory/{id}/child', [ProductController::class, 'getChildCategory'])->name('product.getChildCategory');

    //User
    Route::resource('user' , UserController::class);
    Route::post('user_status', [UserController::class, 'userStatus'])->name('user.status');
    Route::post('user_delete', [UserController::class, 'userDelete'])->name('user.delete');
    Route::post('user_updatedStatus', [UserController::class, 'updatedStatus'])->name('user.updatedStatus');
});

//seller section+++++++
Route::group(['prefix'=>'seller', 'middleware'=>['auth', 'seller']], function(){
    Route::get('', [sellerController::class, 'index'])->name('seller');

});

//user account
Route::group(['prefix'=>'user', 'middleware'=>'auth'], function(){
    Route::get('dashboard', [customerController::class, 'userDashboard'])->name('user.dashboard');
    Route::get('address', [customerController::class, 'userAddress'])->name('user.address');
    Route::get('account-details', [customerController::class, 'userDetails'])->name('user.accountDetails');
    Route::get('order', [customerController::class, 'userOrder'])->name('user.order');

    Route::post('address/add/{id}', [customerController::class, 'userAddressAdd'])->name('user.address.add');
    Route::post('shipping-address/add/{id}', [customerController::class, 'userShippingAddressAdd'])->name('user.shippingAddress.add');
    Route::post('account-details/update/{id}', [customerController::class, 'userAccountUpdate'])->name('user.account.update');

});