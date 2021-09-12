<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Http\Controllers\ProductsSeeder;
use App\Http\Controllers\ProductController;

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






///////////////////////// START TEST

// Huy_test_view
// Route::get('/test1', 'TestController@action');

// Huy_test_connect_db_category
Route::get('/category', 'CategoryController@control');
Route::get('/category/{id}', 'CategoryController@view');


// Test PHP
Route::get('/test', function () {
    return view('test');
});

Route::post('/test_2', function (Request $request) {
    return view('test_2', ['request' => $request->all()]);
    // dd($request);
});

// Test View
Route::get('/test_aaa', function () {
    if (View::exists('product_test.test_view')) {
        // $name = ['name' => 1];
        // $name = [
        //     'key1' => ['name1' => 'Nam', 'age1' => '20'],
        //     'key2' => ['name2' => 'Hoa', 'age2' => '21'],
        //     'key3' => ['name3' => 'Phuc', 'age3' => '22'],
        //     'key4' => ['name4' => 'Vinh', 'age4' => '23'],
        // ];
        return view('product_test.test_view');
    } else {
        return view('product_test.error');
    }
});


// Test layout web

// Route::get('/home-page', function() {
//     $products = \DB::table('products')->get();
//     if (View::exists('index')) {
//         return view('index');
//     }

//     return view('home-page', ['products' => $products]);
// })->name('home-page');

Route::get('/home-page', [ProductsSeeder::class, 'index'])->name('home-page');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');


Route::get('/child-page', function() {
    return view('my-directory.child-page');
})->name('child-page');



