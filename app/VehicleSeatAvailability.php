<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleSeatAvailability extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at']; 

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicles_id', 'id');
    }
}
