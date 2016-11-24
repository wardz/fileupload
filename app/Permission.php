<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
	protected $table = 'permissions';

    public function users()
    {
    	return $this->belongsTo('App\User');
    }

}
