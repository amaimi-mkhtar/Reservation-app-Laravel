<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coiffeur extends Model
{
    protected $table = 'coiffeur';
    protected  $primaryKey= 'NOM_COIFFEUR';
    public $timestamps = false;
    public $incrementing =false;
}
