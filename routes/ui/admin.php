<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* User */

use App\Http\Controllers\admin\AdminCategoryController;
use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\admin\AdminUserController;

Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('admin.home');

Route::group(['prefix' => 'users'], function () {
    Route::get('/list', [AdminUserController::class, 'list'])->name('admin.users.list');
    Route::get('/create', [AdminUserController::class, 'createProcess'])->name('admin.users.createProcess');
    Route::get('/detail/{id}', [AdminUserController::class, 'detail'])->name('admin.users.detail');
    Route::post('/create', [AdminUserController::class, 'create'])->name('admin.users.create');
    Route::put('/update/{id}', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('/delete/{id}', [AdminUserController::class, 'delete'])->name('admin.users.delete');
});

/* Category */
Route::group(['prefix' => 'categories'], function () {
    Route::get('/list', [AdminCategoryController::class, 'list'])->name('admin.categories.list');
    Route::get('/create', [AdminCategoryController::class, 'createProcess'])->name('admin.categories.createProcess');
    Route::get('/detail/{id}', [AdminCategoryController::class, 'detail'])->name('admin.categories.detail');
    Route::post('/create', [AdminCategoryController::class, 'create'])->name('admin.categories.create');
    Route::put('/update/{id}', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/delete/{id}', [AdminCategoryController::class, 'delete'])->name('admin.categories.delete');
});

/* Product */
Route::group(['prefix' => 'products'], function () {
    Route::get('/list', [AdminProductController::class, 'list'])->name('admin.products.list');
    Route::get('/create', [AdminProductController::class, 'createProcess'])->name('admin.products.createProcess');
    Route::get('/detail/{id}', [AdminProductController::class, 'detail'])->name('admin.products.detail');
    Route::post('/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::put('/update/{id}', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/delete/{id}', [AdminProductController::class, 'delete'])->name('admin.products.delete');
});
