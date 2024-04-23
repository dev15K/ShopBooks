<?php

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\ui\CartController;
use App\Http\Controllers\ui\CheckoutController;
use App\Http\Controllers\ui\HomeController;
use App\Http\Controllers\ui\OrderController;
use App\Http\Controllers\ui\UserController;

/* User */
Route::group(['prefix' => 'me'], function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile.show');
    Route::post('/profile', [UserController::class, 'updateProfile'])->name('user.profile.update');
    Route::post('/change-password', [UserController::class, 'changePassword'])->name('user.change.password');
    Route::post('/change-avt', [UserController::class, 'changeAvt'])->name('user.change.avt');
    Route::post('/delete-avt', [UserController::class, 'deleteAvt'])->name('user.delete.avt');
});

/* Cart */
Route::group(['prefix' => 'cart'], function () {
    Route::get('/show', [HomeController::class, 'cart'])->name('cart.show');
    Route::post('/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/update', [CartController::class, 'updateQuantity'])->name('cart.update.quantity');
    Route::post('/change-quantity', [CartController::class, 'changeQuantity'])->name('cart.change.quantity');
    Route::post('/delete/{id}', [CartController::class, 'deleteCart'])->name('cart.delete');
    Route::post('/clear', [CartController::class, 'clearCart'])->name('cart.clear');
});

Route::group(['prefix' => 'checkout'], function () {
    Route::get('/show', [HomeController::class, 'checkout'])->name('checkout.show');
    Route::post('/create', [CheckoutController::class, 'checkout'])->name('checkout.create');
    Route::get('/return-checkout', [CheckoutController::class, 'returnCheckout'])->name('checkout.return');
    Route::post('/vnpay', [CheckoutController::class, 'checkoutByVNPay'])->name('checkout.vnpay');
});

Route::group(['prefix' => 'm/orders'], function () {
    Route::get('/list', [OrderController::class, 'list'])->name('order.me.list');
    Route::get('/detail/{id}', [OrderController::class, 'detail'])->name('order.me.detail');
    Route::post('/cancel/{id}', [OrderController::class, 'cancel'])->name('order.me.cancel');
});

Route::get('/thank-you', [HomeController::class, 'thankyou'])->name('thank.you.show');
