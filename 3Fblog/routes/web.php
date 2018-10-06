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
    return view('admin.layouts.index');
});

Route::group(['prefix' => 'admin'],function() {
	Route::get('/admin','CategoryController@index')->name('admin.index');
	Route::resource('category','CategoryController');
	Route::resource('product','ProductController');
	Route::resource('user','UserController');
});
