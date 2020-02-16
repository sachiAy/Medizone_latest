<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;



class selectviews extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
     

    protected $guard = 'selectviews';
    
    protected $fillable = [
       'name'
    ];

    //protected $primaryKey = 'appointment_id';
    
   
}
