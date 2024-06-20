<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

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

// User Route
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/order/success', [OrderController::class, 'handleSuccess'])->name('order.success');
Route::get('/order/failure', [OrderController::class, 'handleFailure'])->name('order.failure');

// Auth Route
Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // Product Route
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/show-product-{id}', [ProductController::class, 'show'])->name('show-product');
    Route::get('/create-product', [ProductController::class, 'create'])->name('create-product');
    Route::post('/store-product', [ProductController::class, 'store'])->name('store-product');
    Route::get('/edit-product-{id}', [ProductController::class, 'edit'])->name('edit-product');
    Route::put('/update-product-{id}', [ProductController::class, 'update'])->name('update-product');
    Route::delete('/delete-product-{id}', [ProductController::class, 'destroy'])->name('delete-product');

    // Order Route
    Route::get('/order', [OrderController::class, 'index'])->name('order');
    Route::get('/show-order-{id}', [OrderController::class, 'show'])->name('show-order');
});;