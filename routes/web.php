<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Pages
|--------------------------------------------------------------------------
*/
Route::get('/من-نحن', [HomeController::class, 'about'])->name('about');

Route::view('/تواصل-معنا', 'pages.contact')->name('contact');
use App\Models\City;

Route::get('/cities/{governorate}', function ($governorate) {

    return City::where('governorate_id', $governorate)
        ->where('is_active', true)
        ->orderBy('name')
        ->get(['id', 'name']);

})->name('cities.by.governorate');
/*
|--------------------------------------------------------------------------
| Shop
|--------------------------------------------------------------------------
*/

Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/category/{id}', [ShopController::class, 'category'])
    ->name('shop.category');

Route::get('/shop/category/{category}/branch/{branch}', [ShopController::class, 'branch'])
    ->name('shop.branch');
Route::get('/shop/{id}', [ShopController::class, 'show'])->name('shop.show');


Route::get('/mini-cart', [CartController::class, 'miniCart'])
    ->name('cart.mini');
    Route::get('/cart/data', [CartController::class, 'data'])
    ->name('cart.data');
/*

|---------------------------    -----------------------------------------------
| Cart
|--------------------------------------------------------------------------
*/

Route::prefix('cart')->name('cart.')->group(function () {

    Route::get('/', [CartController::class, 'index'])->name('index');

    Route::post('/add/{id}', [CartController::class, 'add'])->name('add');

    Route::post('/increase/{id}', [CartController::class, 'increase'])->name('increase');

    Route::post('/decrease/{id}', [CartController::class, 'decrease'])->name('decrease');

    Route::delete('/remove/{id}', [CartController::class, 'remove'])->name('remove');

});

/*
|--------------------------------------------------------------------------
| Checkout
|--------------------------------------------------------------------------
*/

Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('checkout.index');

Route::post('/checkout', [CheckoutController::class, 'store'])
    ->name('checkout.store');

Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])
    ->name('checkout.success');
/*
|--------------------------------------------------------------------------
| Services
|--------------------------------------------------------------------------
*/

Route::get('/الخدمات', [ServiceController::class, 'index'])
    ->name('services.index');

Route::get('/الخدمات/{slug}', [ServiceController::class, 'show'])
    ->name('services.show');

/*
|--------------------------------------------------------------------------
| Posts
|--------------------------------------------------------------------------
*/

Route::get('/المقالات', [PostController::class, 'index'])
    ->name('posts.index');

Route::get('/المقالات/{slug}', [PostController::class, 'show'])
    ->name('posts.show');

/*
|--------------------------------------------------------------------------
| Contact
|--------------------------------------------------------------------------
*/

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');