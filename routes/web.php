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

//Main route
Route::get('/', 'BookController@index');

// Book route
Route::resource('book', 'BookController');

//Profile route
Route::resource('user', 'UserController');
Route::get('mybooks', 'UserController@mybooks');

//Admin routes
Route::get('dashboard', 'AdminController@index');
Route::get('dashboard/books', 'AdminController@books');
Route::get('dashboard/categories', 'AdminController@categories');
Route::get('dashboard/users', 'AdminController@users');
Route::get('dashboard/messages', 'AdminController@messages');

// Authentication routes
Auth::routes();