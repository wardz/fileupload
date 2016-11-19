<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddonFile extends Model
{
	public $table = "addonfile";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'file',
        'version',
        'changelog',
        'path',
        'size',
        'addon_id'
    ];
}
