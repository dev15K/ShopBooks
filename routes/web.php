<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ui\HomeController;
use App\Http\Controllers\ui\ProductController;
use Illuminate\Support\Facades\Route;

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
Route::get('/lang/{locale}', [MainController::class, 'setLanguage'])->name('language');

Route::fallback(function () {
    return view('error.404');
});

Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', [AuthController::class, 'processLogin'])->name('auth.processLogin');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/register', [AuthController::class, 'processRegister'])->name('auth.processRegister');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::group(['prefix' => 'error'], function () {
    Route::get('/not-found', [ErrorController::class, 'notFound'])->name('error.not.found');
    Route::get('/forbidden', [ErrorController::class, 'forbidden'])->name('error.forbidden');
    Route::get('/unauthorized', [ErrorController::class, 'unauthorized'])->name('error.unauthorized');
});

Route::group(['prefix' => ''], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/shop', [HomeController::class, 'shop'])->name('main.shop');
    Route::get('/detail/{id}', [HomeController::class, 'detailProduct'])->name('main.product.detail');
    Route::get('/contact', [HomeController::class, 'contact'])->name('main.contact');
    Route::get('/about', [HomeController::class, 'about'])->name('main.about');
    Route::get('/coming-soon', [HomeController::class, 'coming'])->name('main.coming.soon');
    Route::get('/products/list', [ProductController::class, 'list'])->name('main.products.list');
    Route::get('/products/category/{id}', [ProductController::class, 'listByCategory'])->name('main.products.list.category');
});

Route::middleware(['auth'])->group(function () {
    require_once __DIR__ . '/ui/auth.php';
});

Route::group(['prefix' => 'admin', 'middleware' => ['ui.admin']], function () {
    require_once __DIR__ . '/ui/admin.php';
});


