<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\AuthController::class, 'index']);

Route::post('login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');

Route::get('login', [App\Http\Controllers\AuthController::class, 'index'])->name('login');

Route::get('register', function () {
    return view('register');
})->name('register');

Route::post('register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');

Route::get('logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::get('admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/google/redirect', [App\Http\Controllers\GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [App\Http\Controllers\GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');

Route::get('products/add', [App\Http\Controllers\ProductController::class, 'index'])->name('products.add');

Route::post('products/add', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');