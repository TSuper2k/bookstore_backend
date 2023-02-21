<?php

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
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

//Customer
Route::prefix('customers')->group(function () {
    Route::get('/', 'App\Http\Controllers\Api\CustomerController@index');

    Route::post('/', 'App\Http\Controllers\Api\CustomerController@store');

    Route::get('/{id}', 'App\Http\Controllers\Api\CustomerController@show');

    Route::put('/{id}', 'App\Http\Controllers\Api\CustomerController@update');

    Route::delete('/{id}', 'App\Http\Controllers\Api\CustomerController@delete');
});
