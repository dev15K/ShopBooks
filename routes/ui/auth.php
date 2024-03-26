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

use App\Http\Controllers\ui\UserController;

Route::get('/profile', [UserController::class, 'profile'])->name('user.profile.show');
Route::post('/profile', [UserController::class, 'updateProfile'])->name('user.profile.update');
Route::post('/change-password', [UserController::class, 'changePassword'])->name('user.change.password');
Route::post('/change-avt', [UserController::class, 'changeAvt'])->name('user.change.avt');
Route::post('/delete-avt', [UserController::class, 'deleteAvt'])->name('user.delete.avt');
