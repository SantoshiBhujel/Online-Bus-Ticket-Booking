<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleType extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at']; 

    protected $fillable = [
        'name','layout', 'totalSeats', 'status',
    ];

}
