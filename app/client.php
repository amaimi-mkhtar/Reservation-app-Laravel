<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;


class client extends model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use Authenticatable;
    protected $table = 'client';
    protected  $primaryKey= 'email';
    public $timestamps = false;
    public $incrementing =false;
    protected $fillable= ['First-Name','Last-Name','phone','email','password'];
    
}
