<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    protected $fillable=[
        'route', 'vehicleType', 'price', 'childrenPrice', 'specialPrice',
    ];
}
