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
    return redirect()->route('home.index');
});

Auth::routes();
Route::resource('/home', 'HomeController');

//Axios calls from Vue
Route::get('/restaurants', 'HomeController@restaurants')->name('restaurants.data');
Route::get('/authCheck', 'HomeController@authCheck')->name('auth.check');
