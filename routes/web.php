<?php

use Illuminate\Support\Facades\Route;

Route::get('/',  'ComicController@index');

Route::resource('/comics', 'ComicController');
