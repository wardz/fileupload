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
     * Check if current user has the given role.
     *
     * @param string $role
     * @return boolean
     */
    public function hasRole($role)
    {
        return Auth::user()->permissions->role_name === $role;
        //return $this->permissions->role_name === $role;
    }

    /**
     * Get projects belonging to user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany('App\Project');
    }

    /**
     * Get permission associated with given user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function permissions()
    {
        return $this->hasOne('App\Permission', 'user_id');
    }

    /**
     * Format binary IP address to human-readable string representation.
     *
     * @param VARBINARY $value
     * @return string
     */
    public function getIpAddressAttribute($value)
    {
        return inet_ntop($value);
    }

    /**
     * Format default IP address string to 32 or 128bit binary structure.
     *
     * @param string $value
     */
    public function setIpAddressAttribute($value)
    {
        $this->attributes['ip_address'] = inet_pton($value);
    }
}
