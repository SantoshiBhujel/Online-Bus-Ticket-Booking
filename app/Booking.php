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
        'route',
        'adultPassengers',
        'childPassengers',
        'specialPassengers',
        'offerCode',
        'price',
        'Pemail',
        'pickupLocation',
        'dropLocation',
        'paymentStatus'
    ];
}
