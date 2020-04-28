<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [ 'review','rating' ];
    /**
     * Get the product that the review belongs to.
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    /**
     * Get the user that owns the review.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
