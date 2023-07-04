<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\App;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//login & logout & quen mat khau
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/checkLogin', [AuthController::class, 'postLogin'])->name('checkLogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forgot_password', [AuthController::class, 'forgot_password'])->name('forgot_password');
Route::post('/post_forgot_password', [AuthController::class, 'post_forgot_password'])->name('post_forgot_password');



//products
Route::prefix('/')->middleware(['auth', 'PreventBackHistory'])->group(function () {
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/store', [ProductController::class, 'store'])->name('products.store');
        Route::get('/show/{id}', [ProductController::class, 'show'])->name('products.show');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/update/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
        Route::get('/search', [ProductController::class, 'search'])->name('products.search');
        Route::get('/exportProduct', [ProductController::class, 'exportProduct'])->name('products.exportProduct');

        // thùng rác
        Route::get('/trash', [ProductController::class, 'trash'])->name('products.trash');
        // khôi phục
        Route::get('/restore/{id}', [ProductController::class, 'restore'])->name('products.restore');
        // xóa vĩnh viễn
        Route::get('/deleteforever/{id}', [ProductController::class, 'deleteforever'])->name('products.deleteforever');
    });


    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('/search', [UserController::class, 'search'])->name('users.search');
        Route::get('/show{id}', [UserController::class, 'show'])->name('users.show');
        Route::get('/export', [UserController::class, 'export'])->name('users.export');
    });

    Route::resource('customers', CustomerController::class);
    Route::resource('categories', CategoryController::class);

    Route::prefix('groups')->group(function () {
        Route::get('/', [GroupController::class, 'index'])->name('groups.index');
        Route::get('/create', [GroupController::class, 'create'])->name('groups.create');
        Route::post('/store', [GroupController::class, 'store'])->name('groups.store');
        Route::get('/edit/{id}', [GroupController::class, 'edit'])->name('groups.edit');
        Route::put('/update/{id}', [GroupController::class, 'update'])->name('groups.update');
        Route::get('/destroy/{id}', [GroupController::class, 'destroy'])->name('groups.destroy');
        Route::get('/search', [GroupController::class, 'search'])->name('groups.search');
        Route::get('/detail/{id}', [GroupController::class, 'detail'])->name('groups.detail');
        Route::put('/group_detail/{id}', [GroupController::class, 'group_detail'])->name('groups.group_detail');
    });
    Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/show/{id}', [OrderController::class, 'show'])->name('orders.orderdetail');
        Route::delete('/destroy/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
        Route::get('/search', [OrderController::class, 'search'])->name('orders.search');
        Route::get('/exportOrder', [OrderController::class, 'exportOrder'])->name('orders.export');
    });
});


//shop
Route::prefix('shop1')->group(function () {
    Route::get('/', [ShopController::class, 'index'])->name('shop.index');
    Route::get('show/{slug}', [ShopController::class, 'show'])->name('shop.show');
    Route::get('/cart', [ShopController::class, 'cart'])->name('cart.index');
    Route::get('/addtocart/{id}', [ShopController::class, 'addtocart'])->name('shop.addtocart');
    Route::get('/checkOuts', [ShopController::class, 'checkOuts'])->name('checkOuts');
    Route::patch('update-cart', [ShopController::class, 'update']);
    Route::delete('remove-from-cart', [ShopController::class, 'remove']);
    Route::post('/order', [ShopController::class, 'order'])->name('orders');
    //đăng nhập shop
    Route::get('/login', [ShopController::class, 'login'])->name('shop.login');
    Route::post('/checklogin', [ShopController::class, 'checklogin'])->name('shop.checklogin');
    //đăng kí
    Route::get('/register', [ShopController::class, 'register'])->name('shop.register');
    Route::post('/checkregister', [ShopController::class, 'checkregister'])->name('shop.checkregister');
    //đăng xuất shop
    Route::post('/logout', [ShopController::class, 'logout'])->name('shop.logout');
    Route::get('/shopsearch', [ShopController::class, 'shopsearch'])->name('shop.search');

});

// Route::get('getMessage', function () {
//     $lang = session()->get('lang', 'en');
//     App::setLocale($lang);
//     echo '<br>' . __('messages.save_success');
//     echo '<br>' . __('messages.update_success');
//     echo '<br>' . __('messages.delete_success');
//     echo '<br>' . __('messages.welcome', [
//         'name' => 'phi'
//     ]);
// });

// Route::get('changeLanguage/{lang}', function ($lang) {
//     session()->put('lang', $lang);
//     return redirect('/getMessage');
// });
