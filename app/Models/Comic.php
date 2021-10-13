<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $table = 'comics';

    protected $fillable = [
        'title', 'description', 'thumb', 'price', 'series', 'price',
        'series', 'sale_date', 'type'
    ];
}
