<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Computadora extends Model
{
    CONST UPDATED_AT = 'FUA';
    
    public $timestamps = false;

    use SoftDeletes;
   
}

?>