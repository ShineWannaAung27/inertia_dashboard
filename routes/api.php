<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/hello', function () {
    return "Hello World!";
});


//Items
Route::get('items')->name('items')->uses('ItemController@index');
Route::post('items')->name('items.store')->uses('ItemController@store');
Route::put('items/{item}')->name('items.update')->uses('ItemController@update');
Route::delete('items/{item}')->name('items.destroy')->uses('ItemController@destroy');

