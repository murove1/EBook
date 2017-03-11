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
	return view('index');
});

Route::get('book', function () {
	return view('book');
});

Route::get('profile','UserController@profile');
Route::get('editprofile','UserController@edit');
Route::post('editprofile','UserController@update');


Auth::routes();