<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;


class patients extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    protected $guard = 'patients';

    protected $fillable = [
        'customer_type','first_name','last_name','NIC','birthday','blood_group','address','contact_no','username','email','password',
    ];

    protected $hidden = [
        'password',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
