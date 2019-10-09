<?php

Route::get('/', function () {
    return redirect()->route('home.index');
});

Auth::routes();
Route::resource('/home', 'HomeController');

//Axios calls from Vue
//Restaurant
Route::get('/restaurants', 'RestaurantController@restaurants')->name('restaurants.data');
Route::get('/restaurant/{id}', 'RestaurantController@restaurantPage')->name('restaurant.page');
Route::get('/restaurant/consumables/{id}', 'RestaurantController@consumables')->name('consumables.page');

//Navigation Authcheck
Route::get('/authCheck', 'HomeController@authCheck')->name('auth.check');

//Searchbar
Route::post('/search', 'HomeController@restaurantSearch')->name('restaurant.search');

//Settings
Route::post('/profile/update', 'ProfileController@update')->name('profile.update');
