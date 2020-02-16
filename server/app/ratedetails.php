<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;



class ratedetails extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    protected $guard = 'ratedetails';
    
    protected $fillable = [
        'appointment_id','dr_id','patient_id','clinic_id','participation'
    ];

   
}