<?php

namespace App;

class Permission extends Model
{
	protected $table = 'permissions';

	/**
	 * [users description]
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function users()
    {
    	return $this->belongsTo('App\User');
    }

}
