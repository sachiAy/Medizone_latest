<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class test extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    use HasApiTokens, Notifiable;

    protected $guard = 'web';

    protected $fillable = [
        'username','email','password'
    ];

    protected $hidden = [
        'password','rememberToken'
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
