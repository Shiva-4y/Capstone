<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TransactionController;




Route::get('/', function () {
    return view('welcome');
});



Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);


Route::get('/register', [RegisterController::class, 'show'])->name('register');

Route::post('/register', [RegisterController::class, 'register']);

Route::get('/user_dashboard', function () {
    $products = Product::latest()->get();
    return view('dashboard_home', compact('products'));
})->middleware('auth');

Route::get('/admin', function () {
    $products = Product::latest()->get();  // get all products, newest first
    return view('admin', compact('products'));
})->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::get('/user/add-product', [ProductController::class, 'create'])->name('products.create');
    Route::post('/user/add-product', [ProductController::class, 'store'])->name('products.store');
    Route::get('/user/products', [ProductController::class, 'index'])->name('products.index');
     Route::get('/user/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/user/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/user/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout')->middleware('auth');

Route::get('/marketplace', function () {
    $products = Product::latest()->get();
    return view('marketplace', compact('products'));
})->middleware('auth');
Route::post('/transactions/{product}', [TransactionController::class, 'store'])
    ->name('transactions.store')
    ->middleware('auth');