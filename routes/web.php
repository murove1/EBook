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

//Main routes
Route::get('/', 'BookController@index');
Route::get('feedback', 'MessagesController@create');
Route::post('feedback', 'MessagesController@store');

// Book route
Route::resource('book', 'BookController');

//Category route
// Route::resource('category', 'CategoryController');

//User routes
Route::resource('user', 'UserController');
Route::get('mybooks', 'UserController@mybooks');
Route::get('setting', 'UserController@setting');
Route::post('setting', 'UserController@updatepassword');

//Admin routes
Route::get('dashboard', 'AdminController@index');
Route::get('dashboard/books', 'AdminController@books');
Route::get('dashboard/categories', 'AdminController@categories');
Route::get('dashboard/users', 'AdminController@users');
Route::get('dashboard/messages', 'AdminController@messages');
Route::get('dashboard/telegram', 'AdminController@telegram');

// Authentication routes
Auth::routes();