<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;



class doctors extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
     

    protected $guard = 'doctors';
    
    protected $fillable = [
        'username','reg_no','first_name','last_name','NIC','birthday','specialty','contact_no','email','password','api_token'
    ];

    protected $hidden = [
        'password'
    ];

    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = bcrypt($password);
    // }
   
}
