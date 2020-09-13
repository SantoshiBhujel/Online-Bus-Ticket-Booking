<?php

namespace App;

use App\VehicleType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facilities extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    
    protected $fillable=[
        'name', 'services'
    ];

    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class, 'vehicleTypes_id', 'id');
    }
}
