<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class admins extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    protected $guard = 'admins';
    
    protected $fillable = [
        'admin_no','first_name','last_name','contact_no','username','email','password',
    ];

    protected $hidden = [
        'password'
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
