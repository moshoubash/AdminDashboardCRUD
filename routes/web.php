<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CouponController;

Route::get('/', function () {
    return view('index');
});

Route::resource('coupons', CouponController::class);



use App\Http\Controllers\ProductController;

Route::resource('products', ProductController::class);
