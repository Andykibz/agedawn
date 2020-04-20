<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','slug'
    ];
    /**
     * Get products under a category
     */
    public function products(){
        return $this->hasMany('App\Product');
    }
}
