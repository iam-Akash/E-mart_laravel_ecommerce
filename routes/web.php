<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\Admin\ProductController;
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

Route::get('/', [IndexController::class, 'home'])->name('homepage');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin');

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
