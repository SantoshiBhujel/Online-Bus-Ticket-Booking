<?php

namespace App;

use App\Facilities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleType extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at']; 

    protected $fillable = [
        'name','layout', 'totalSeats', 'status',
    ];

    public function facilities()
    {
        return $this->hasMany(Facilities::class, 'vehicleTypes_id', 'id');
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'vehicleType_id', 'id');
    }

}
