<?php

use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//Route Parameters

//Required Parameters
Route::get('/userid/{id}', function (Request $request, $id) {
    return 'User '.$id;
});

//Option Parameters
Route::get('/username/{name?}', function (Request $request, $name = null) {
    return 'Hello '.$name;
});

Route::get('/username/{name?}', function (Request $request, $name = 'Guest') {
    return 'Hello '.$name;
});

//Route Group

//Middleware
/* Route::middleware(['admin'])->group(function () {
    
    Route::get('/products', function () {
        return view('dashbroad');
    })->name('dashbroad');

    Route::get('/users', function () {
        return view('users');
    })->name('users');
}); */

//Prefix
Route::name('admin.')->prefix('admin')->middleware(['auth', 'admin'])->group(function () {

    Route::resource('products', AdminProductController::class);
    Route::get('products/history', [AdminProductController::class, 'history'])->name('products.history');

    Route::get('order/list', [AdminOrderController::class, 'index'])->name('order.list');

    Route::get('category/index', [AdminCategoryController::class, 'index'])->name('category.index');
    Route::get('category/create', [AdminCategoryController::class, 'create'])->name('category.create');
    Route::post('category/store', [AdminCategoryController::class, 'store'])->name('category.store');
    Route::get('category/edit/{id}',[AdminCategoryController::class, 'edit'])->name('category.edit');
    Route::put('category/update{id}', [AdminCategoryController::class, 'update'])->name('category.update');
    Route::delete('category/delete/{id}', [AdminCategoryController::class, 'destroy'])->name('category.destroy');
});

Route::get('/shopper_fashion/home', function() {  
    return view('home-page');
})->name('shopper.home'); 



Route::post('order-save', [OrderController::class, 'saveProductsToSession'])->name('order.save');
Route::get('order-list', [OrderController::class, 'orderList'])->name('order.list');
Route::post('order-remove', [OrderController::class, 'removeDataFromSession'])->name('order.remove');
Route::put('order-update', [OrderController::class, 'update'])->name('order.update');
Route::get('order-checkout', [OrderController::class, 'checkout'])->name('order.checkout');
Route::post('order-place', [OrderController::class, 'orderPlace'])->name('order.place');
Route::post('order-send-mail', [OrderController::class, 'sendMail'])->name('order.send-mail');

Route::get('/shopper_fashion/shop/', [ShopController::class, 'shopIndex'])->name('shopper.shop');

Route::get('/shopper_fashion/product/{id}', [ProductController::class, 'productInfo'])->name('product.info');

Route::get('/shopper_fashion/shop-single', function () {
    return view('shopper-shop-single');
});

Route::get('/shopper_fashion/cart', function () {
    return view('shopper-cart');
})->name('shopper.cart');

Route::get('/shopper_fashion/thankyou', function () {
    return view('shopper-thankyou');
});

Route::get('/shopper_fashion/about', function () {
    return view('shopper-about');
})->name('shopper.about');

Route::get('/shopper_fashion/contact', function () {
    return view('shopper-contact');
})->name('shopper.contact');





