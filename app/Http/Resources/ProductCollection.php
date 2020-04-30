<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return [
        //     'data' => $this->collection,
        // ];
        return [
            'data' => $this->collection->transform(function($product){
                return [ 
                    'id'        =>  $product->id,
                    'name'      =>  $product->name,
                    'quantity'  =>  $product->quantity,
                    'image'     =>  $product->image,
                    'price'     =>  $product->price,
                    'category'  =>  $product->category->name,
                    'created'   =>  $product->created_at,

                ];
            })
        ];

    }
}
