<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserBooking extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    public $table ='bookings';

    protected $fillable =[
        'date',
        'vehicleType',
        'vehicleNo', 
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
