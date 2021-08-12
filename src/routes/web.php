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

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/customer/create', 'CustomerController@create')->name('customer.create');
Route::post('/customer/store', 'CustomerController@store')->name('customer.store');
Route::get('/customer/index', 'CustomerController@index')->name('customer.index');
Route::get('/order/create', 'OrderController@create')->name('order.create');
Route::post('/order/store', 'OrderController@store')->name('order.store');
Route::get('/order/index', 'OrderController@index')->name('order.index');
Route::get('/order/show/{id}', 'OrderController@show')->name('order.show');
