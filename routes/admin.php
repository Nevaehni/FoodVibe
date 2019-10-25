<?php

Route::resource('admin', 'AdminController')->middleware('is_admin');