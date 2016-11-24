<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'license',
        'description',
    ];

    public function scopeUserIsOwner($query)
    {
        $query->where('user_id', '=', \Auth::user()->id);
    }

    /**
     * Get a list of tag ids associated with the current project.
     * @return array
     */
    public function getTagListAttribute()
    {
        return $this->tags->pluck('name')->all();
    }

    /**
     * Get relationship for User model.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get relationship for File model.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files()
    {
        return $this->hasMany('App\File');
    }

    /**
     * Get relationship for Tag model.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}
