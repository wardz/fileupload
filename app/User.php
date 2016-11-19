<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const ROLE_BANNED = 0;
    const ROLE_GUEST = 1;
    const ROLE_MOD = 2;
    const ROLE_ADMIN = 3;

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

    public function getIsAdminAttribute()
    {
        return $this->role_id == User::ROLE_ADMIN;
    }

    public function addons()
    {
        return $this->hasMany('App\Addon');
    }
}
