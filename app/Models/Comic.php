<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comic extends Model
{

    use SoftDeletes;
    protected $table = 'comics';

    protected $fillable = [
        'title', 'description', 'thumb', 'price', 'series', 'price',
        'series', 'sale_date', 'type'
    ];
}
