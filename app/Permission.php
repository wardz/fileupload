<?php

namespace App;

class Permission extends Model
{
	/**
	 * Name of DB table to use.
	 *
	 * @var string
	 */
	protected $table = 'permissions';

	public function getRoles()
	{
		return config('roles');
	}

	/**
	 * Get users associated with the given permission.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function users()
    {
    	return $this->belongsTo('App\User');
    }
}
