<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

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
Route::middleware(['role:root'])->prefix('/admin_panel')->group(function () {
    Route::get(null, [AdminHomeController::class, 'index'])->name('adminHome');

    Route::resource('category', AdminCategoryController::class);
});

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/', [HomeController::class, 'index'])->name("home");
Route::get('/{cat}', [ProductController::class, 'showCategory'])->name('showCategory');
Route::get('/{cat}/{alias}', [ProductController::class, 'showProduct'])->name('showProduct');

Route::name('delivery.')->prefix('/delivery')->group(function(){
    Route::post(null, [CartController::class, 'addDelivery'])->name('add');
    Route::delete(null, [CartController::class, 'deleteDelivery'])->name('delete');
});

Route::name('cart.')->prefix('/cart')->group(function(){
    Route::patch(null, [CartController::class, 'deleteItem'])->name('deleteItem');
    Route::post(null, [CartController::class, 'addItem'])->name('addItem');
    Route::delete(null, [CartController::class, 'clear'])->name('clear');
});

Route::name('qty.')->group(function(){
    Route::patch('/inc', [CartController::class, 'incQty'])->name('inc');
    Route::patch('/dec', [CartController::class, 'decQty'])->name('dec');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');