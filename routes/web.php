<?php

use Illuminate\Support\Facades\Route;


Route::get('/',  'ComicController@index');

Route::get('/comics/trash',  'ComicController@trash')->name('comics.trash');

Route::resource('/comics', 'ComicController');
