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
