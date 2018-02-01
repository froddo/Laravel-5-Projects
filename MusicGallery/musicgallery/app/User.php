<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function discos(){
        return $this->hasMany('App\Disco');
    }

    public function rnbs(){
        return $this->hasMany('App\Rnb');
    }

    public function ballads(){
        return $this->hasMany('App\Ballad');
    }
}
