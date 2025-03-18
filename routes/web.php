<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CouponController;

Route::get('/', function () {
    return view('index');
});

Route::resource('coupons', CouponController::class);