<?php

use Illuminate\Support\Facades\Route;

/* use Carbon\Carbon; */

Route::get('/',  'ComicController@index');

Route::get('/comics/trash',  'ComicController@trash')->name('comics.trash');

Route::delete('/comics/{comic}/perdel',  'ComicController@permanentlyDelete')->name('comics.perdel');

Route::patch('/comics/{comic}/restore',  'ComicController@restore')->name('comics.restore');

Route::resource('/comics', 'ComicController');
