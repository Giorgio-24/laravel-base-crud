<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Comic extends Model
{

    public function getDeletedAt()
    {
        return Carbon::create($this->deleted_at)->format('d-m-Y');
    }

    use SoftDeletes;
    protected $table = 'comics';

    protected $fillable = [
        'title', 'description', 'thumb', 'price', 'series', 'price',
        'series', 'sale_date', 'type'
    ];
}
