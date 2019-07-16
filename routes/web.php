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


// /todos, /todos/create, /todos/1
Route::resource('todos', 'TodoController');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'TodoController@index')->name('home');
    Route::get('/home', 'TodoController@index')->name('home');
});

