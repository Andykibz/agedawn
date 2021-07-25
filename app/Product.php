<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'quantity', 'slug', 'image', 'sku_num', 'category_id',
        'description', 'price'
    ];

    /**
     * Get the category that product belongs to.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Get the post that owns the comment.
     */
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    /**
     * The orders that have this product
     */
    public function orders()
    {
        return $this->belongsToMany('App\Order', 'orders_products', 'product_id', 'order_id')->withPivot('product_count');
    }
}
