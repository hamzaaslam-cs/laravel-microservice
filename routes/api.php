<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::middleware('api')->group(function () {
    Route::group([
        'prefix' => 'auth'
    ], function () {
        Route::post('/register', [AuthController::class, 'register'])->name('register');
        Route::post('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
        Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
        Route::post('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');
    });

    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::resource('products', ProductController::class);
        Route::resource('orders', OrderController::class);

    });


    Route::get('test', function () {
        return Order::with(['user', 'product'])->where("user_id", 3)->get();
    });
});
