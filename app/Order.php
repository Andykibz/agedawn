<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The user who the order belongs to
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * The products under a given order
     */
    public function products()
    {
        return $this->belongsToMany('App\Product','orders_products','order_id','product_id')->withPivot('product_count');
    }
}
