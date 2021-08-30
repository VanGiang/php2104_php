<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

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

require __DIR__ . '/auth.php';
//route loi chao
Route::get('/greeting', function () {
    return 'xin chao';
});

Route::get('/user/{id?}', function ($id = null) {
    return 'user_id :' . $id;
});

Route::view('welcome', 'welcome');

//route group
Route::middleware(['auth'])->group(function () {
    // route method
    Route::view('/route-view', 'route-view');

    //route post
    Route::post('/show-post', function (Request $request) {
        return view('show-post', ['show' => $request->all()]);
        //dd('show');
    });

    //route get
    Route::get('/show-get', function (Request $request) {
        return view('show-get', ['show' => $request->all()]);
    });
});


Route::get('/show', function () {

    //return view('/test_view/show', ['name' => 'thao']);

    if (View::exists('test-view.show')) {
        // $data = ['name' => 'thao', 'age' => '26'];
        // return view('/test_view/show', $data);

        return view('/test-view/show')
            ->with('name', 'thao')
            ->with('age', 24);
    }
    return view('welcome');
});

