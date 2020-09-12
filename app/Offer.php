<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at']; 
    
    protected $fillable=[
        'routes_id', 'name', 'startDate', 'endDate', 'offerCode', 'discount', 'terms', 'route', 'offerNumber'
    ];


    public function route()
    {
        return $this->belongsTo(Route::class, 'routes_id', 'id');
    }
}
