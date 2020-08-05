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

Route::get('/', 'FrontEndController@index')->name('shop.cart.index');
Route::get('/cart', 'CartController@listCart')->name('cart.list');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('categories', 'CategoryController');

Route::resource('products', 'ProductController');

//------------Route Manage--------------------

Route::get('/color', 'ManageController@indexColor')->name('color.index');
Route::match(['get', 'post'], '/color/create', 'ManageController@createColor')->name('color.create');
Route::get('/color/edit/{id}', 'ManageController@editColor')->name('color.edit');
Route::post('/color/store', 'ManageController@storeColor')->name('color.store');
Route::get('/color/destroy/{id}', 'ManageController@destroyColor')->name('color.destroy');
Route::get('/color/restore', 'ManageController@restoreColor')->name('color.restore');

Route::get('/color/restore/info/{id}', 'ManageController@postRestoreColor')->name('color.restore.info');

Route::get('/status', 'ManageController@indexStatus')->name('status.index');
Route::match(['get', 'post'],'/status/create', 'ManageController@createStatus')->name('status.create');
Route::get('/status/edit/{id}', 'ManageController@editStatus')->name('status.edit');
Route::post('/status/store', 'ManageController@storeStatus')->name('status.store');
Route::get('/status/destroy/{id}', 'ManageController@destroyStatus')->name('status.destroy');
