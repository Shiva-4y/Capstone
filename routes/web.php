<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use App\Models\Product;




Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'show'])->name('register');

Route::post('/register', [RegisterController::class, 'register']);

Route::get('/user_dashboard', function () {
    return view('user_dashboard');
})->middleware('auth');

Route::get('/admin', function () {
    $products = Product::latest()->get();  // get all products, newest first
    return view('admin', compact('products'));
})->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::get('/user/add-product', [ProductController::class, 'create'])->name('products.create');
    Route::post('/user/add-product', [ProductController::class, 'store'])->name('products.store');
});