<?php

use Illuminate\Support\Facades\Route;

Route::get('/comics/trash',  'ComicController@trash')->name('comics.trash');

Route::get('/',  'ComicController@index');


Route::resource('/comics', 'ComicController');
