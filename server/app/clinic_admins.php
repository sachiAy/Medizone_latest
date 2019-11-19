<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class clinic_admins extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    protected $guard = 'clinic_admins';
    
    protected $fillable = [
        'c_admin_no','first_name','last_name','contact_no','username','email','password',
    ];

    protected $hidden = [
        'password'
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
