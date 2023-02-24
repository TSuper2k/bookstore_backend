<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//Admin
Route::prefix('/')->group(function(){
    //Home
    Route::prefix('home')->group(function(){
        Route::get('/', 'App\Http\Controllers\Admin\HomeController@index')->name('home.index');
    });

    //Book
    Route::prefix('book')->group(function(){
        Route::get('/', 'App\Http\Controllers\Admin\BookController@index')->name('book.index');

        Route::get('/create', 'App\Http\Controllers\Admin\BookController@create')->name('book.create');

        Route::post('/store', 'App\Http\Controllers\Admin\BookController@store')->name('book.store');

        Route::get('/edit/{id}', 'App\Http\Controllers\Admin\BookController@edit')->name('book.edit');

        Route::post('/update/{id}', 'App\Http\Controllers\Admin\BookController@update')->name('book.update');

        Route::get('/delete{id}', 'App\Http\Controllers\Admin\BookController@delete')->name('book.delete');
    });

    //User
    Route::prefix('user')->group(function(){
        Route::get('/', 'App\Http\Controllers\Admin\UserController@index')->name('user.index');

        Route::get('/create', 'App\Http\Controllers\Admin\UserController@create')->name('user.create');

        Route::post('/store', 'App\Http\Controllers\Admin\UserController@store')->name('user.store');

        Route::get('/edit/{id}', 'App\Http\Controllers\Admin\UserController@edit')->name('user.edit');

        Route::post('/update/{id}', 'App\Http\Controllers\Admin\UserController@update')->name('user.update');

        Route::get('/delete{id}', 'App\Http\Controllers\Admin\UserController@delete')->name('user.delete');
    });

    //Order
    Route::prefix('order')->group(function(){
        Route::get('/', 'App\Http\Controllers\Admin\OrderController@index')->name('order.index');

        Route::get('/create', 'App\Http\Controllers\Admin\OrderController@create')->name('user.create');

        Route::post('/store', 'App\Http\Controllers\Admin\OrderController@store')->name('user.store');

        Route::get('/edit/{id}', 'App\Http\Controllers\Admin\OrderController@edit')->name('user.edit');

        Route::post('/update/{id}', 'App\Http\Controllers\Admin\OrderController@update')->name('user.update');

        Route::get('/delete{id}', 'App\Http\Controllers\Admin\OrderController@delete')->name('user.delete');
    });
});
