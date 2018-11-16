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

// Route::get('/', function () {
//     return view('pages.main.index');
// })->middleware('auth')->name('main_page');

Route::get('/', function () {
    return view('pages.main.welcome');
})->name('main_page');

Route::prefix('users')->name('users.')->middleware('auth')->group(function () {
    Route::get('', 'UsersController@index')->name('index');
    Route::get('/create', 'UsersController@create')->name('create');
    Route::get('/edit/{id}', 'UsersController@edit')->name('edit')->where('id', '[0-9]+');
    Route::get('/delete/{id}', 'UsersController@delete')->name('delete')->where('id', '[0-9]+');
    Route::post('/store', 'UsersController@store')->name('store');
    Route::post('/update/{id}', 'UsersController@update')->name('update');
});

Route::prefix('')->name('main.')->group(function () {
    Route::get('/login', 'MainController@login')->name('login');
    Route::get('/register', 'MainController@register')->name('register');
    Route::post('/store_user', 'MainController@store_user')->name('store_user');
    Route::get('/newses', 'MainController@index_news')->name('index_news');
    Route::get('/statistics', 'MainController@index_statistics')->name('index_statistics');
    Route::get('/statistics/get', 'MainController@get_countries_statistics')->name('get_countries_statistics');
});

Route::prefix('auth')->name('auth.')->group(function () {
    Route::post('/login', 'AuthController@login')->name('login');
    Route::get('/logout', 'AuthController@logout')->name('logout');
});

Route::prefix('news')->name('news.')->middleware('auth')->group(function () {
    Route::get('', 'NewsController@index')->name('index');
    Route::get('/create', 'NewsController@create')->name('create');
    Route::get('/edit/{id}', 'NewsController@edit')->name('edit')->where('id', '[0-9]+');
    Route::get('/delete/{id}', 'NewsController@delete')->name('delete')->where('id', '[0-9]+');
    Route::post('/store', 'NewsController@store')->name('store');
    Route::post('/update/{id}', 'NewsController@update')->name('update');
});

Route::prefix('contacts')->name('contacts.')->middleware('auth')->group(function () {
    Route::get('', 'ContactsController@index')->name('index');
    Route::get('/import', 'ContactsController@import')->name('import');
    Route::post('/store_import', 'ContactsController@store_import')->name('store_import');
});
