<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
  
    protected $fillable = [
        'first_name','last_name','username','email', 'password','identity'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
