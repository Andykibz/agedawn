<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    protected $guarded = [];


    /**
     * Get all of the articles that are assigned this tag.
     */
    public function articles()
    {
        return $this->morphedByMany('App\Article', 'taggable');
    }

    /**
     * Get all of the events that are assigned this tag.
     */
    public function events()
    {
        return $this->morphedByMany('App\Event', 'taggable');
    }
    
}
