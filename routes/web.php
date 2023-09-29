<?php

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

// Auth

use Illuminate\Support\Facades\Route;

Route::get('login')->name('login')->uses('Auth\LoginController@showLoginForm')->middleware('guest');
Route::post('login')->name('login.attempt')->uses('Auth\LoginController@login')->middleware('guest');
Route::post('logout')->name('logout')->uses('Auth\LoginController@logout');

// Dashboard
Route::get('/')->name('dashboard')->uses('DashboardController')->middleware('auth');

// Users
Route::get('users')->name('users')->uses('UsersController@index')->middleware('remember', 'auth');
Route::get('users/create')->name('users.create')->uses('UsersController@create')->middleware('auth');
Route::post('users')->name('users.store')->uses('UsersController@store')->middleware('auth');
Route::get('users/{user}/edit')->name('users.edit')->uses('UsersController@edit')->middleware('auth');
Route::put('users/{user}')->name('users.update')->uses('UsersController@update')->middleware('auth');
Route::delete('users/{user}')->name('users.destroy')->uses('UsersController@destroy')->middleware('auth');
Route::put('users/{user}/restore')->name('users.restore')->uses('UsersController@restore')->middleware('auth');

// Images
Route::get('/img/{path}', 'ImagesController@show')->where('path', '.*');

// Organizations
Route::get('organizations')->name('organizations')->uses('OrganizationsController@index')->middleware('remember', 'auth');
Route::get('organizations/create')->name('organizations.create')->uses('OrganizationsController@create')->middleware('auth');
Route::post('organizations')->name('organizations.store')->uses('OrganizationsController@store')->middleware('auth');
Route::get('organizations/{organization}/edit')->name('organizations.edit')->uses('OrganizationsController@edit')->middleware('auth');
Route::put('organizations/{organization}')->name('organizations.update')->uses('OrganizationsController@update')->middleware('auth');
Route::delete('organizations/{organization}')->name('organizations.destroy')->uses('OrganizationsController@destroy')->middleware('auth');
Route::put('organizations/{organization}/restore')->name('organizations.restore')->uses('OrganizationsController@restore')->middleware('auth');

// Contacts
Route::get('contacts')->name('contacts')->uses('ContactsController@index')->middleware('remember', 'auth');
Route::get('contacts/create')->name('contacts.create')->uses('ContactsController@create')->middleware('auth');
Route::post('contacts')->name('contacts.store')->uses('ContactsController@store')->middleware('auth');
Route::get('contacts/{contact}/edit')->name('contacts.edit')->uses('ContactsController@edit')->middleware('auth');
Route::put('contacts/{contact}')->name('contacts.update')->uses('ContactsController@update')->middleware('auth');
Route::delete('contacts/{contact}')->name('contacts.destroy')->uses('ContactsController@destroy')->middleware('auth');
Route::put('contacts/{contact}/restore')->name('contacts.restore')->uses('ContactsController@restore')->middleware('auth');

// Item
Route::get('items')->name('items')->uses('ItemController@index')->middleware('remember', 'auth');
Route::get('items/create')->name('items.create')->uses('ItemController@create')->middleware('remember', 'auth');
Route::post('items')->name('items.store')->uses('ItemController@store')->middleware('remember', 'auth');
Route::get('items/{item}/edit')->name('items.edit')->uses('ItemController@edit')->middleware('remember', 'auth');
Route::delete('items/{item}')->name('items.destroy')->uses('ItemController@destroy')->middleware('auth');
Route::put('items/{item}')->name('items.update')->uses('ItemController@update')->middleware('auth');

// Customer
Route::get('customers')->name('customers')->uses('CustomerController@index')->middleware('remember', 'auth');
Route::get('customers/create')->name('customers.create')->uses('CustomerController@create')->middleware('remember', 'auth');
Route::post('customers')->name('customers.store')->uses('CustomerController@store')->middleware('remember', 'auth');
Route::get('customers/{customer}/edit')->name('customers.edit')->uses('CustomerController@edit')->middleware('remember', 'auth');
Route::delete('customers/{customer}')->name('customers.destroy')->uses('CustomerController@destroy')->middleware('auth');
Route::put('customers/{customer}')->name('customers.update')->uses('CustomerController@update')->middleware('auth');

// Order
Route::get('orders')->name('orders')->uses('CustomerOrderController@index')->middleware('remember', 'auth');
Route::get('orders/create')->name('orders.create')->uses('CustomerOrderController@create')->middleware('remember', 'auth');
Route::post('orders')->name('orders.store')->uses('CustomerOrderController@store')->middleware('remember', 'auth');
Route::get('orders/{order}/edit')->name('orders.edit')->uses('CustomerOrderController@edit')->middleware('remember', 'auth');
Route::delete('orders/{order}')->name('orders.destroy')->uses('CustomerOrderController@destroy')->middleware('auth');
Route::put('orders/{order}')->name('orders.update')->uses('CustomerOrderController@update')->middleware('auth');


// Reports
Route::get('reports')->name('reports')->uses('ReportsController')->middleware('auth');

// 500 error

