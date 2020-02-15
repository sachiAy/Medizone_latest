<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class clinic_admins extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    protected $guard = 'clinic_admins';
    
    protected $fillable = [
        'first_name','last_name','mobile_no','email','username','password','api_token'
    ];

    protected $hidden = [
        'password'
    ];

    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = bcrypt($password);
    // }
}
