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
Route::get('items')->name('items')->uses('APi\ItemController@index');
Route::post('items')->name('items.store')->uses('APi\ItemController@store');
Route::get('items/{item}')->name('items.show')->uses('APi\ItemController@show');
Route::put('items/{item}')->name('items.update')->uses('APi\ItemController@update');
Route::delete('items/{item}')->name('items.destroy')->uses('APi\ItemController@destroy');

//Customers
Route::get('customers')->name('customers')->uses('APi\CustomerController@index');
Route::post('customers')->name('customers.store')->uses('APi\CustomerController@store');
Route::put('customers/{customer}')->name('customers.update')->uses('APi\CustomerController@update');
Route::delete('customers/{customer}')->name('customers.destroy')->uses('APi\CustomerController@destroy');

// Order
Route::get('orders')->name('orders')->uses('APi\CustomerOrderController@index');
Route::post('orders')->name('orders.store')->uses('APi\CustomerOrderController@store');
Route::delete('orders/{customer_order}')->name('orders.destroy')->uses('APi\CustomerOrderController@destroy');
Route::put('orders/{customer_order}')->name('orders.update')->uses('APi\CustomerOrderController@update');



