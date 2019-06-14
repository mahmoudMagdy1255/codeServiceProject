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
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/services/my-services', 'ServiceController@myServices');
Route::get('/services/user-services/{id}', 'ServiceController@userServices');
Route::resource('services', 'ServiceController');

Route::get('/orders/get-my-send-orders', 'OrdersController@mySendOrders');

Route::resource('orders', 'OrdersController');