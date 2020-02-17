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
        'dr_id','patient_id','clinic_id','appointment_date','appointment_time','first_name','last_name','mobile_no','email','NIC',
    ];

    //protected $primaryKey = 'appointment_id';
    
   
}
