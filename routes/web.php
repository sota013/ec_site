<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ProductCreateController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\ProductEditController;
use App\Http\Controllers\ListedProductDetailController;
use App\Http\Controllers\AccountEditController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/create', [ProductCreateController::class, 'create'])
    ->middleware('auth')
    ->name('products.create');

Route::post('/products/create', [ProductCreateController::class, 'store'])
    ->middleware('auth')
    ->name('products.store');

Route::get('/products/{id}', [ProductDetailController::class, 'show'])
    ->name('products.show');

Route::get('/register', [RegisterController::class, 'show'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/mypage/products/{id}', [ListedProductDetailController::class, 'show'])
    ->middleware('auth')
    ->name('mypage.products.show');

Route::get('/mypage', [MyPageController::class, 'index'])
    ->middleware('auth')
    ->name('mypage');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::delete('/mypage/products/{id}', [ListedProductDetailController::class, 'destroy'])
    ->middleware('auth')
    ->name('mypage.products.destroy');

Route::get('/products/{id}/edit', [ProductEditController::class, 'edit'])
    ->middleware('auth')
    ->name('products.edit');

Route::get('/account/edit', [AccountEditController::class, 'edit'])
    ->middleware('auth')
    ->name('account.edit');

Route::put('/account', [AccountEditController::class, 'update'])
    ->middleware('auth')
    ->name('account.update');

Route::put('/products/{id}', [ProductEditController::class, 'update'])
    ->middleware('auth')
    ->name('products.update');

Route::post('/login', [LoginController::class, 'store'])
    ->name('login.store');

Route::post('/products/{id}/like', [LikeController::class, 'store'])
    ->middleware('auth')
    ->name('products.like');

Route::get('/products/{id}/purchase', [PurchaseController::class, 'create'])
    ->middleware('auth')   
    ->name('products.purchase.create');

Route::post('/products/{id}/purchase', [PurchaseController::class, 'store'])
    ->middleware('auth')
    ->name('products.purchase');

Route::post('/contact', [ContactController::class, 'send'])
    ->name('contact.send');