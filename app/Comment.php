<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [ 'comment', 'user_id', 'article_id' ];

    /**
     * Get the article that the comment belongs to.
     */
    public function article()
    {
        return $this->belongsTo('App\Article');
    }

    /**
     * Get the user that owns the review.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
