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
    //return view('layouts.main');
    return redirect()->route('login');
});


Route::get('/register', 'UsersController@register')->name('register');
Route::get('/login', 'UsersController@login')->name('login');

Route::prefix('users')->name('users.')->group(function () {
    Route::post('/store', 'UsersController@store')->name('store');
});
