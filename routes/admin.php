<?php

Route::resource('/', 'Admin\AdminController');
Route::resource('users', 'Admin\UserController');
Route::resource('consumables', 'Admin\ConsumableController');
Route::resource('restaurants', 'Admin\RestaurantController');
Route::resource('orders', 'Admin\OrderController');