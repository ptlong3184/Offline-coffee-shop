<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('home.index');
});

Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/chart', 'ChartController@index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/orders', 'OrderController');
Route::resource('/suppliers', 'SuppliersController');
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('/products', [App\Http\Controllers\ProductsController::class, 'index'])->name('products.index');
Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
Route::post('/orders', [App\Http\Controllers\OrderController::class, 'store'])->name('orders.store');
Route::post('/products', [App\Http\Controllers\ProductsController::class, 'store'])->name('products.store');
Route::put('/products/{id}', [App\Http\Controllers\ProductsController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [App\Http\Controllers\ProductsController::class, 'destroy'])->name('products.destroy');
Route::post('users/store', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::put('/users/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
Route::get("/products/add_to_cart/{id}",[App\Http\Controllers\ProductsController::class,'addToCart'])->name('addToCart');
Route::get("/cart",[App\Http\Controllers\ProductsController::class,'showCart'])->name('home.showCart');


// admin order
Route::get('/order',[App\Http\Controllers\AdminOrderController::class, 'index'])->name('orderAdmin.index');
Route::get('/orderDetail/{id}',[App\Http\Controllers\AdminOrderController::class, 'detail'])->name('orderAdmin.detail');
Route::get('/orderProcess/{id}',[App\Http\Controllers\AdminOrderController::class, 'process'])->name('orderAdmin.process');
