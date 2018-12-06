<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pristation extends Model
{
    protected $table = 'pristation';
    protected  $primaryKey= 'NOM_PRESTATION';
    public $timestamps = false;
    public $incrementing =false;
}
