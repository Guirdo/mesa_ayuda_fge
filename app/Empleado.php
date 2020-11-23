<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    CONST UPDATED_AT = 'FUA';
    
    public $timestamps = false;

    use SoftDeletes;
}
