<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ShopController;


Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/من-نحن', function () {
    return view('pages.about');
})->name('about');
Route::get('/تواصل-معنا', function () {
    return view('pages.contact');
})->name('contact');


// ShopController
Route::get('/products', [ShopController::class, 'products'])
    ->name('products');

Route::get('/products/{id}', [ShopController::class, 'productDetails'])
    ->name('product.details');

// 🔥 Services Routes
Route::get('/الخدمات', [ServiceController::class, 'index'])->name('services.index');

Route::get('/الخدمات/{slug}', [ServiceController::class, 'show'])->name('services.show');


Route::get('/المقالات', [PostController::class, 'index'])->name('posts.index');

Route::get('/المقالات/{slug}', [PostController::class, 'show'])->name('posts.show');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


// cart

Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

Route::post('/cart/increase/{id}', [CartController::class, 'increase'])->name('cart.increase');

Route::post('/cart/decrease/{id}', [CartController::class, 'decrease'])->name('cart.decrease');

Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');