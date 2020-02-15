<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class main_admins extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    protected $guard = 'main_admins';
    
    protected $fillable = [
        'first_name','last_name','mobile_no','email','username','password','birthday','api_token'
    ];

    protected $hidden = [
        'password'
    ];

//     public function setPasswordAttribute($password)
//     {
//         $this->attributes['password'] = bcrypt($password);
//     }
}
