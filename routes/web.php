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

Route::group(['middleware' => ['auth']], function() {

    Route::get('/address/new', 'Controller@create_new_address')->name('addressCreate');
	Route::post('/address/new', 'Controller@store_new_address')->name('addressStore');
	Route::get('/payment/new', 'Controller@create_new_payment')->name('paymentCreate');
	Route::post('/payment/new', 'Controller@store_new_payment')->name('paymentStore');
	Route::resource('/cart', 'CartController');
	Route::resource('/order', 'OrderController');

});

Route::get('/', function () {return view('home');});
Route::get('/user/{id}', 'Controller@user');
Route::get('/category/{id}', 'Controller@category');


Auth::routes();

Route::resource('/product', 'ProductController');



