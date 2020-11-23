<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipo extends Model
{
    CONST UPDATED_AT = 'FUA';
    
    public $timestamps = false;

    use SoftDeletes;
}
