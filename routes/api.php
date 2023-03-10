<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//User auth
Route::prefix('/')->group(function () {
    Route::post('/login', 'App\Http\Controllers\Api\AuthController@login');

    Route::post('/register', 'App\Http\Controllers\Api\AuthController@register');

    Route::get('/logout', 'App\Http\Controllers\Api\AuthController@logout')->middleware('auth:api');
});

//Book
Route::prefix('books')->group(function () {
    Route::get('/', 'App\Http\Controllers\Api\BookController@index');

    Route::post('/', 'App\Http\Controllers\Api\BookController@store');

    Route::get('/{id}', 'App\Http\Controllers\Api\BookController@show');

    Route::put('/{id}', 'App\Http\Controllers\Api\BookController@update');

    Route::delete('/{id}', 'App\Http\Controllers\Api\BookController@delete');
});

//User
Route::prefix('users')->group(function () {
    Route::get('/', 'App\Http\Controllers\Api\UserController@index');

    Route::post('/', 'App\Http\Controllers\Api\UserController@store');

    Route::get('/{id}', 'App\Http\Controllers\Api\UserController@show');

    Route::put('/{id}', 'App\Http\Controllers\Api\UserController@update');

    Route::delete('/{id}', 'App\Http\Controllers\Api\UserController@delete');
});

//Order
Route::prefix('orders')->group(function () {
    Route::get('/', 'App\Http\Controllers\Api\OrderController@index');

    Route::post('/', 'App\Http\Controllers\Api\OrderController@store');

    Route::get('/{id}', 'App\Http\Controllers\Api\OrderController@show');

    Route::put('/{id}', 'App\Http\Controllers\Api\OrderController@update');

    Route::delete('/{id}', 'App\Http\Controllers\Api\OrderController@delete');
});
