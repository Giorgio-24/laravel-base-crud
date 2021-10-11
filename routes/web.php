<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'ComicController@index')->name('home');
