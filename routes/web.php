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
    return view('pages.main.index');
})->middleware('auth')->name('main_page');

Route::prefix('users')->name('users.')->middleware('auth')->group(function () {
    Route::get('', 'UsersController@index')->name('index');
});

Route::prefix('')->name('main.')->group(function () {
    Route::get('/login', 'MainController@login')->name('login');
    Route::get('/register', 'MainController@register')->name('register');
    Route::post('/store_user', 'MainController@store_user')->name('store_user');
});

Route::prefix('auth')->name('auth.')->group(function () {
    Route::post('/login', 'AuthController@login')->name('login');
    Route::get('/logout', 'AuthController@logout')->name('logout');
});

Route::prefix('news')->name('news.')->middleware('auth')->group(function () {
    Route::get('', 'NewsController@index')->name('index');
    Route::get('/add', 'NewsController@add')->name('add');
});

Route::get('my-theme', function () {
    return view('layouts.main');
});
