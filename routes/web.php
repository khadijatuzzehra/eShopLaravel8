<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[FrontendController::class, 'index']);
Route::get('category',[FrontendController::class,'category']);
Route::get('view-category/{slug}',[FrontendController::class,'viewcategory']);
Route::get('category/{cate_slug}/{prod_name}', [FrontendController::class,'productview']);
Auth::routes();

Route::get('/home',[App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group( function(){
    Route::get('cart',[CartController::class,'viewcart']);
    Route::get('remove/{id}',[CartController::class,'removeProd']);
    Route::get('checkout',[CheckoutController::class,'index']);
    Route::post('add-to-cart',[CartController::class,'addProduct']);
    Route::put('place-order',[CheckoutController::class,'placeorder']);
    Route::get('my-orders',[UserController::class,'index']);
    Route::get('view-order/{id}',[UserController::class,'view']);
    Route::post('add-rating',[RatingController::class,'add']);
    Route::post('review/{product_slug}',[ReviewController::class,'add']);
    Route::put('review',[ReviewController::class,'create']);
});

Route::middleware(['auth','isAdmin'])->group(function (){
    Route::get('/dashboard','Admin\FrontendController@index');
    Route::get('/categories', 'Admin\CategoryController@index');
    Route::get('/add-category', 'Admin\CategoryController@add');
    Route::post('/insert-category','Admin\CategoryController@insert');
    Route::get('/edit-prod/{id}', [CategoryController::class, 'edit']);
    Route::put('/update-category/{id}',[CategoryController::class, 'update']);
    Route::get('/delete-category/{id}',[CategoryController::class, 'destroy']);
    Route::get('/products', 'Admin\ProductController@index');
    Route::get('/add-products', 'Admin\ProductController@add');
    Route::post('/insert-products','Admin\ProductController@insert');
    Route::get('/edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('/update-product/{id}',[ProductController::class, 'update']);
    Route::get('/delete-product/{id}',[ProductController::class, 'destroy']);
    Route::get('orders','Admin\OrderController@index');
    Route::get('admin/view-order/{id}',[OrderController::class,'view']);
    Route::put('update-order/{id}',[OrderController::class,'update']);
    Route::get('order-history',[OrderController::class,'orderHistory']);
    
});


