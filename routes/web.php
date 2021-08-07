<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/', [HomeController::class, 'index'])->name("home");
Route::get('/{cat}', [ProductController::class, 'showCategory'])->name('showCategory');
Route::get('/{cat}/{alias}', [ProductController::class, 'showProduct'])->name('showProduct');

Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('addToCart');