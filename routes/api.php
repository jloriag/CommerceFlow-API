<?php
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SellController;
use App\Http\Controllers\Api\EcommerceDataController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(['message' => 'Welcome to the API']);
});

Route::apiResource('products', ProductController::class);
Route::apiResource('sells', SellController::class);
Route::apiResource('ecommercedata', EcommerceDataController::class);
Route::apiResource('user', UserController::class);
