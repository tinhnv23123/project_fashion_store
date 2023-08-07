<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    // 

    // Admin
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::post('/products/delete', [ProductController::class, 'deleteMultiple'])->name('product.deleteMultiple');
    Route::resource('/brand', BrandController::class);
    Route::resource('/user', UserController::class);
    Route::get('/orders',[OrderController:: class, 'index'] );
    Route::get('/orders/{orderId}', [OrderController::class, 'orderDetail'])->name('admin.orderdetail');
    Route::get('/delivered/{orderId}', [OrderController::class, 'delivered']);

    //Client
    // cart
    Route::get('/viewcart', [CartController::class, 'viewcart']);
    Route::post('/add_to_cart/{id}', [CartController::class, 'add_to_cart']);
    Route::get('/remove_cart/{id}', [CartController::class, 'remove_cart']);
    Route::post('/cart/update-or-clear', [CartController::class, 'updateOrClearCart'])->name('cart.updateOrClear');

    //Check out
    Route::get('/checkout', [CartController::class, 'checkout']);
    Route::get('/shipping', [CartController::class, 'shipping']); 
    Route::get('/bill', [CartController::class, 'bill']);
    Route::post('/checkout/shipping', [CartController::class, 'checkship'])->name('checkout.shipping');
    Route::get('/order', [CartController::class, 'order'])->name('order.shipping');


    Route::get('/myorder', [CartController::class, 'myorder']);
    Route::get('/order/{orderId}', [CartController::class, 'viewOrderDetail'])->name('order.detail');
});

Route::get('/redirect', [HomeController::class, 'redirect']);
// View sản phẩm ra trang shop
Route::get('/products', [HomeController::class, 'products']);
Route::get('/products/{id}', [HomeController::class, 'detail'])->name('product_detail');
