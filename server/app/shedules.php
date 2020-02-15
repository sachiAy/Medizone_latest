<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;



class shedules extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    protected $guard = 'shedules';
    
    protected $fillable = [
        'dr_id','clinic_id','date','time'
    ];

   
}