<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class salon extends Model
{
    protected $table = 'salon';
    protected  $primaryKey= 'NAME_SALON';
    public $timestamps = false;
    public $incrementing =false;
}
