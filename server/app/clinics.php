<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;



class clinics extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    protected $guard = 'clinics';
    
    protected $fillable = [
        'dr_id','ca_id','name','registration_no'
    ];

   
}