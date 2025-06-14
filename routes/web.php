<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\ChatController;
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

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/password', [UserProfileController::class, 'updatePassword'])->name('profile.updatePassword');
});

Route::get('/marketplace', [MarketplaceController::class, 'index'])->name('marketplace');

Route::middleware('auth')->group(function () {
    Route::get('/chat/{product}/{receiver}', [ChatController::class, 'chat'])->name('chat');
    Route::post('/chat/send', [ChatController::class, 'send'])->name('chat.send');
});
Route::get('/messages', [ChatController::class, 'conversationList'])->name('chat.messages');
Route::get('/chat/{productId}/{receiverId}', [ChatController::class, 'chat'])->name('chat.view');
Route::post('/chat/send', [ChatController::class, 'send'])->name('chat.send');

Route::middleware('auth')->group(function () {
    Route::post('/transaction/buy/{productId}', [TransactionController::class, 'store'])->name('transactions.buy');

    Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction.index');

    Route::post('/transaction/pay/{id}', [TransactionController::class, 'markAsPaid'])->name('transaction.pay');
 Route::post('/transactions/{id}/mark-paid', [TransactionController::class, 'markAsPaid'])->name('transaction.markPaid');
    Route::post('/transactions/{id}/release', [TransactionController::class, 'release'])->name('transaction.release');
    Route::post('/transactions/{id}/complete', [TransactionController::class, 'complete'])->name('transaction.complete');
    Route::post('/transactions/{id}/cancel', [TransactionController::class, 'cancel'])->name('transaction.cancel');


    Route::get('/seller/orders', [TransactionController::class, 'sellerOrders'])->name('seller.orders');
});