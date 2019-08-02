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


Auth::routes();

Route::get('/exampleVue', function() {
    return view('exampleVue');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('todos', 'TodoController');
    Route::get('/', 'TodoController@indexVue')->name('home');
    Route::get('/home', 'TodoController@indexVue')->name('home');
});

