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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('books', 'BooksController');
    Route::get('users/{user}',  'UserController@edit')->name('users.edit');
    Route::put('users/{user}',  'UserController@update')->name('users.update');
    Route::get('mybooks', 'BooksController@mybooks')->name('mybooks');
});
