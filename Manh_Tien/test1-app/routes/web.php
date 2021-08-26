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

Route::get('/form', function(){
    return view('view');
});
//route form get
Route::get('/formget', function (Request $request) {
    return view('view', ['data' => $request->all()]);
});
//route form post
Route::post('/formpost', function (Request $request) {
    return view('view', ['data' => $request->all()]);
});
//group 
Route::group(['admin'], function() {
    Route::get('/select', function () {
        return 'select database';
    });
    Route::get('/edit', function () {
        return 'Edit database';
    });
    Route::get('/delete', function () {
        return 'Delete database';
    });
});
Route::get('/view', function() {
    return view('view');
});



Route::post('/test2', function (Request $request) {
    echo view('view2', ['request'=> $request->input('name')]);
});

//Route::redirect('/here', '/there');  //chuyển từ trang trước ra sau

Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

Route::get('/user/{id}', function (Request $request, $id) {//nhập id tùy chọn ở sau  có thể có hoặc ko
    return 'User '.$id;
});

Route::get('/users/{name?}', function ($name = 'John') {//nhập tên tùy chọn ở sau  có thể có hoặc ko
    return $name;
});

Route::get('/userss/{name}', function ($name) {
    //
})->where('name', '[A-Za-z]+');//kiểm tra nếu đkiện sai thì báo lỗi


Route::get('/greeting', function () {
   return view('greeting', ['name' => 'James']);
}); 

Route::get('/parameters/{id}', function ($id) {
    return 'Parameter ' . $id;
})->name('param');


