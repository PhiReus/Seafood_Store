<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthCustomerController;
use App\Http\Controllers\Api\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function () {
    Route::post('/login', [AuthCustomerController::class, 'login']);
    Route::post('/register', [AuthCustomerController::class, 'register']);
    Route::post('/logout', [AuthCustomerController::class, 'logout']);
    Route::post('/refresh', [AuthCustomerController::class, 'refresh']);
    Route::post('/change-pass', [AuthCustomerController::class, 'changePassWord']);
});
Route::apiResource('users',UserController::class);
Route::get('products',[ProductController::class,'index']);
Route::get('products/{id}',[ProductController::class,'detail']);
Route::get('carts',[CartController::class,'allCart']);
Route::get('update_cart',[CartController::class,'UpdateCart']);
Route::get('remove_to_cart/{id}',[CartController::class,'removeToCart']);
Route::get('remove_allcart',[CartController::class,'removeAllCart']);

Route::post('orders/checkout',[OrderController::class,'checkout']);

Route::get('categories/getProducts/{id}',[CategoryController::class,'getProducts']);
Route::apiResource('categories',CategoryController::class);
