<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;


class patients extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    protected $guard = 'patients';

    protected $fillable = [
        'first_name','last_name','nic','mobile_no','email','address','username','password','customer_type','api_token'
    ];

    protected $hidden = [
        'password',
    ];

    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = bcrypt($password);
    // }
}
