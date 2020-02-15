<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

use Illuminate\Contracts\Auth\Authenticatable;


class people extends Model implements Authenticatable
{

    // 
    use HasApiTokens, Notifiable;
    use \Illuminate\Auth\Authenticatable;
   
    protected $guard = 'web';


    protected $fillable = [
        'uname','upassword'
    ];


    public function setPasswordAttribute($upassword){
        $this->attributes['upassword'] = bcrypt($upassword);
    }
}
