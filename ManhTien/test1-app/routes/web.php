<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/you_name/{name?}', function ($name = 'Tien') {
    return 'hello ' . $name;
});

require __DIR__.'/auth.php';

use Illuminate\Http\Request;

Route::get('/user/{id}', function (Request $request, $id) {
    return 'User '.$id;
});

Route::get('/view', function() {
    return view('view');
});

Route::get('/test', function (Request $request) {
    return view('view', ['request'=> $request->all()]);
});
