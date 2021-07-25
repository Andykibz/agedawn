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
            'data' => $this->collection->transform(function ($product) {
                return [
                    'id'        =>  $product->id,
                    'name'      =>  $product->name,
                    'quantity'  =>  $product->quantity,
                    'image'     =>  $product->image,
                    'price'     =>  $product->price,
                    'category'  =>  $product->category->name,
                    'created'   =>  $product->created_at,
                ];
            }),
            'meta' => [
                'total' => $this->total(),
                'count' => $this->count(),
                'per_page' => $this->perPage(),
                'current_page' => $this->currentPage(),
                'last_page' => $this->lastPage()
            ],
            'links'  =>  [
                'first'     => $this->url(1),
                'next'      => $this->nextPageUrl(),
                'prev'      => $this->previousPageUrl(),
                'last'      => $this->url($this->lastPage())

            ],
        ];
    }
}
