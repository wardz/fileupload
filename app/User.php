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

    /**
     * Get hasMany relationship for project model.
     * 
     * @example User::addons()->find($id)
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany('App\Project');
    }

    public function permissions()
    {
        return $this->hasOne('App\Permission');
    }

    public function hasRole($type)
    {
        return $this->permissions()->where('role_id', '=', $type)->first();
    }

    public function getIpAddressAttribute($value)
    {
        return inet_ntop($value);
    }

    public function setIpAddressAttribute($value)
    {
        $this->attributes['ip_address'] = inet_pton($value);
    }
}
