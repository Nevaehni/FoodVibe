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

//Restaurant Owner
Route::get('/restaurant/consumable/all', 'RestaurantController@allConsumables')->name('consumables.all');
Route::post('/restaurant/consumable/delete', 'RestaurantController@delete')->name('restaurant.delete');
Route::post('/restaurant/consumable/store', 'RestaurantController@store')->name('restaurant.store');
Route::post('/restaurant/consumable/new', 'RestaurantController@newConsumable')->name('restaurant.new');
Route::get('/restaurant/owner/check', 'RestaurantController@check')->name('restaurant.check');

//Navigation Authcheck
Route::get('/authCheck', 'HomeController@authCheck')->name('auth.check');

//Searchbar
Route::post('/search', 'HomeController@restaurantSearch')->name('restaurant.search');

//Settings
Route::post('/profile/update', 'ProfileController@update')->name('profile.update');
