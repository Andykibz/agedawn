<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Get products under a category
     */
    public function products(){
        return $this->hasMany('App\Product');
    }
}
