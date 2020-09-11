<?php

namespace App;

use App\VehicleType;
use Illuminate\Database\Eloquent\Model;

class Facilities extends Model
{
    protected $fillable=[
        'name', 'services'
    ];

    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class, 'vehicleTypes_id', 'id');
    }
}
