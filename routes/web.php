<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'ComicController@index')->name('home');

Route::get('comics/{id}', 'ComicController@show')->name('comics.show');
