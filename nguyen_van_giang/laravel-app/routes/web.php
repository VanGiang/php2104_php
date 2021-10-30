<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;


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



require __DIR__.'/auth.php';

Route::get('/param/{id}/param2/{id2?}', function (Request $request, $id, $id2 = 200) {
    dd($request->all());
    return view('welcome', ['id' => $id, 'id2' => $id2]);
});

Route::get('/myview', function () {
    return view('myview');
})->name('myview');

Route::post('test', function(Request $request) {
    dd($request->all());
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/myview', function () {
        return view('myview');
    })->name('myview');
});

Route::name('admin.')->prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('products', AdminProductController::class);

    Route::get('orders', [AdminOrderController::class, 'index'])->name('order.index');
});

Route::get('/home-page', [HomeController::class, 'index'])->name('home-page');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('/categories/{id}', [CategoryController::class, 'index'])->name('category.show');
Route::post('add-to-cart', [OrderController::class, 'saveDataToSession'])->name('order.save');
Route::get('order-list', [OrderController::class, 'orderList'])->name('order.list');
Route::post('remove-product', [OrderController::class, 'removeDataFromSession'])->name('order.remove');
Route::put('order-update', [OrderController::class, 'update'])->name('order.update');
Route::get('checkout', [OrderController::class, 'checkout'])->name('order.checkout');
Route::post('purchase', [OrderController::class, 'purchase'])->name('order.purchase');

Route::get('order-export', [OrderController::class, 'export'])->name('order.export');

Route::get('/child-page', function() {
    return view('my-directory.child-page');
})->name('child-page');
