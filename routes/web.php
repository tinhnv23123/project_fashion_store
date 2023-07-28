<?php
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
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
});
Route::get('/redirect', [HomeController::class, 'redirect']);
Route::resource('/category', CategoryController::class);
Route::resource('/product', ProductController::class);
Route::post('/products/delete', [ProductController::class, 'deleteMultiple'])->name('product.deleteMultiple');;
Route::resource('/brand', BrandController::class);
Route::resource('/user', UserController::class);


// View sản phẩm ra trang shop
Route::get('/products', [HomeController::class, 'products']);
//  Cart
Route::get('/viewcart', [CartController::class, 'viewcart']);
Route::post('/add_to_cart/{id}', [CartController::class, 'add_to_cart']);
Route::get('/remove_cart/{id}', [CartController::class, 'remove_cart']);