<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;



class appointments extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
     

    protected $guard = 'appointments';
    
    protected $fillable = [
        'name','telephone','nic','email'
    ];

    
   
}
