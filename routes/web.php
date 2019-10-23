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

//Cart
Route::post('/cart/product', 'RestaurantController@cartAdd')->name('cart.add');
Route::get('/cart/buy', 'RestaurantController@buy')->name('cart.buy');

//Navigation bar
Route::get('/user/orders', 'ProfileController@userOrders')->name('user.orders');
Route::get('/authCheck', 'ProfileController@authCheck')->name('auth.check');
Route::post('/profile/update', 'ProfileController@update')->name('profile.update');

//Restaurant Owner
Route::get('/restaurant/consumable/all', 'RestaurantController@allConsumables')->name('consumables.all');
Route::post('/restaurant/consumable/delete', 'RestaurantController@delete')->name('restaurant.delete');
Route::post('/restaurant/consumable/store', 'RestaurantController@store')->name('restaurant.store');
Route::post('/restaurant/consumable/new', 'RestaurantController@newConsumable')->name('restaurant.new');
Route::get('/restaurant/owner/check', 'RestaurantController@check')->name('restaurant.check');

//Search bar
Route::post('/search', 'HomeController@restaurantSearch')->name('restaurant.search');


