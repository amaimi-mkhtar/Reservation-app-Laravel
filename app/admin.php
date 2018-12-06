<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class admin extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use Authenticatable;
    protected $table = 'admin';
    protected  $primaryKey= 'email';
    public $timestamps = false;
    public $incrementing =false;
    protected $fillable= ['email','name','prenom','password'];
}
