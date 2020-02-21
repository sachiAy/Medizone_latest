<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliregs extends Model
{
    //
    protected $guard = 'cliregs';

    protected $fillable = [
        'name','regnum','email','clinic_address','contact_no'
    ];
    // protected $hidden = [
    //     'password'
    // ];
}
