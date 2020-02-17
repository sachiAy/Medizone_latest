<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;



class schedules extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    protected $guard = 'schedules';
    
    protected $fillable = [
        'dr_id','clinic_id','clinic_name','date','time'
    ];

   
}