<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeType extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at']; 
    protected $fillable=['position','details'];
}
