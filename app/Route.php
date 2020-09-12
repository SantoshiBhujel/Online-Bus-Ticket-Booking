<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Route extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at']; 

    public function offers()
    {
        return $this->hasMany(Route::class, 'routes_id', 'id');
    }
}
