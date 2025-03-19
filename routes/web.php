<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('index');
});


Route::resource('categories', CategoryController::class);
Route::resource('coupons', CouponController::class);
Route::resource('products', ProductController::class);