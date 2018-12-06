<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    protected $table = 'reservation';
    protected  $primaryKey= 'ID_RESERVATION';
    public $timestamps = false;
    public $incrementing =false;
}
