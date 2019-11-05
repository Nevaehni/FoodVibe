<?php

Route::resource('admin', 'Admin\AdminController');
Route::resource('users', 'Admin\UserController');
Route::resource('consumables', 'Admin\ConsumableController');