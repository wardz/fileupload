<?php

namespace App;

class File extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'file_name',
        'file_path',
        'file_version',
        'file_changelog',
        'file_mime',
        'file_size'
    ];

    /** 
     * Mutate file_size to return formatted human-readable size. E.g 1024 to 1 kB.
     * http://stackoverflow.com/questions/5501427/php-filesize-mb-kb-conversion
     *
     * @param int $bytes
     * @return string
     */
    public function getFileSizeAttribute($bytes)
    {        
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' kB';
        } elseif ($bytes >= 1) {
            return $bytes . ' bytes';
        } else {
            return '~0 bytes';
        }
    }

    /**
     * Get projects that are associated with file.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects()
    {
        return $this->belongsToMany('App\Project');
    }
}
