<?php

use Illuminate\Support\Facades\Route;


Route::get('/',  'ComicController@index');

Route::get('/comics/trash',  'ComicController@trash')->name('comics.trash');

Route::patch('/comics/{comic}/restore',  'ComicController@restore')->name('comics.restore');

Route::resource('/comics', 'ComicController');
