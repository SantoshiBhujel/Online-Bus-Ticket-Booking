<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable =[
        'date',
        'vehicleType', 
        'vehicleNo',
        'seats',
        'route',
        'adultPassengers',
        'childPassengers',
        'specialPassengers',
        'offerCode',
        'price',
        'Pname',
        'Pemail',
        'pickupLocation',
        'dropLocation',
        'paymentStatus'
    ];

}
