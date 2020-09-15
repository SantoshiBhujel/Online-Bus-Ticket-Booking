<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at']; 

    protected $fillable =[
        'regNo', 'vehicleType', 'engineNo', 'chassisNo', 'modelNo', 'ownerName', 'ownerNumber','brandName', 'status'
    ];

    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class, 'vehicleType_id', 'id');
    }
}
