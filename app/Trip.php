<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trip extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $fillable=[
        'title',
        'vehicleType',
        'route',
        'status',
    ];
}
