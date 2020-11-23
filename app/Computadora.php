<?php
namespace App;

use Illuminate\Database\Eloquent\Model;


class Computadora extends Model
{
    CONST UPDATED_AT = 'FUA';
    
    public $timestamps = false;

    use SoftDeletes;
   
}

?>