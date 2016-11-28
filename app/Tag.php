<?php

namespace App;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id', 'tag_id',
    ];

	/**
	 * Get projects associated with the given tag.
     *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
    public function projects()
    {
    	return $this->belongsToMany('App\Project', 'project_tag');
    }
}
