<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AddonFile;
use Auth;

class Addon extends Model
{
    public $table = 'addon';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'author',
        'license',
        'description',
        'category_id',
        'user_id'
    ];

    public function scopeUserIsOwner($query)
    {
        $query->where('user_id', '=', Auth::user()->id);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function files()
    {
        // $addon->files->version
        // $addon->files[0]->version
        return $this->hasOne('App\AddonFile');
    }
}
