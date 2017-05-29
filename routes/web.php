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
Route::get('faq', ['uses' => 'PagesController@faq', 'as' => 'faq']);
Route::get('about', ['uses' => 'PagesController@about', 'as' => 'about']);

//Feedback routes
Route::get('feedback', ['uses' => 'MessagesController@create', 'as' => 'feedback.create']);
Route::post('feedback', ['uses' => 'MessagesController@store', 'as' => 'feedback.store']);

// Book route
Route::resource('book', 'BookController');
Route::get('topview', ['uses' => 'BookController@topview', 'as' => 'book.topview']);
Route::get('toplike', ['uses' => 'BookController@toplike', 'as' => 'book.toplike']);
Route::get('updated', ['uses' => 'BookController@updatedbooks', 'as' => 'book.updated']);
Route::get('category/{id}', ['uses' => 'BookController@categoriesbooks', 'as' => 'book.categories']);
Route::get('/like/{id}', ['uses' => 'BookController@like', 'as' => 'book.like']);
Route::get('/likecount/{id}', ['uses' => 'BookController@likecount', 'as' => 'likecount']);

//User routes
Route::resource('user', 'UserController');
Route::get('mybooks', ['uses' => 'UserController@mybooks', 'as' => 'mybooks']);
Route::get('mybooks/getmybooks', ['uses' => 'UserController@getmybooks', 'as' => 'getmybooks']);
Route::get('setting', ['uses' => 'UserController@setting', 'as' => 'setting']);
Route::put('setting', ['uses' => 'UserController@updatepassword', 'as' => 'password.update']);

//Admin routes
Route::get('dashboard', ['uses' => 'AdminController@index', 'as' => 'dashboard']);

//Control Books admin
Route::get('dashboard/books', ['uses' => 'AdminController@books', 'as' => 'admin.book.index']);
Route::get('dashboard/books/getbook', ['uses' => 'AdminController@getbook', 'as' => 'getbooks']);
Route::get('dashboard/book/create', ['uses' => 'AdminController@create_book', 'as' => 'admin.book.create']);
Route::post('dashboard/books/', ['uses' => 'AdminController@store_book', 'as' => 'admin.book.store']);
Route::get('dashboard/book/edit/{book}', ['uses' => 'AdminController@edit_book', 'as' => 'admin.book.edit']);
Route::put('dashboard/books/{book}', ['uses' => 'AdminController@update_book', 'as' => 'admin.book.update']);
Route::delete('dashboard/book/destroy/{book}', ['uses' => 'AdminController@destroy_book', 'as' => 'admin.book.destroy']);


//Control Categoryies admin
Route::get('dashboard/categories', ['uses' => 'AdminController@categories', 'as' => 'admin.categories.index']);
Route::get('dashboard/books/getcategories', ['uses' => 'AdminController@getcategories', 'as' => 'getcategories']);
Route::get('dashboard/category/create', ['uses' => 'AdminController@create_category', 'as' => 'admin.category.create']);
Route::post('dashboard/categories/', ['uses' => 'AdminController@store_category', 'as' => 'admin.category.store']);
Route::get('dashboard/category/edit/{category}', ['uses' => 'AdminController@edit_category', 'as' => 'admin.category.edit']);
Route::put('dashboard/category/{category}', ['uses' => 'AdminController@update_category', 'as' => 'admin.category.update']);
Route::delete('dashboard/category/destroy/{category}', ['uses' => 'AdminController@destroy_category', 'as' => 'admin.category.destroy']);

//Control Users admin
Route::get('dashboard/users', ['uses' => 'AdminController@users', 'as' => 'admin.users.index']);
Route::get('dashboard/users/getusers', ['uses' => 'AdminController@getusers', 'as' => 'getusers']);
Route::get('dashboard/user/edit/{user}', ['uses' => 'AdminController@edit_user', 'as' => 'admin.user.edit']);
Route::put('dashboard/user/{user}', ['uses' => 'AdminController@update_user', 'as' => 'admin.user.update']);
Route::delete('dashboard/user/destroy/{user}', ['uses' => 'AdminController@destroy_user', 'as' => 'admin.user.destroy']);

//Control Messages admin
Route::get('dashboard/messages', ['uses' => 'AdminController@messages', 'as' => 'admin.messages.index']);
Route::delete('dashboard/messages/{message}', ['uses' => 'AdminController@destroy_message', 'as' => 'admin.message.destroy']);

//Send Telegram message admin
Route::get('dashboard/telegram', ['uses' => 'AdminController@telegram', 'as' => 'admin.telegram.index']);
Route::post('dashboard/telegram', ['uses' => 'AdminController@store_telegram', 'as' => 'admin.telegram.store']);

// Authentication routes
Auth::routes();