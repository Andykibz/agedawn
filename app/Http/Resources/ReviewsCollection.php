<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ReviewsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($review){
                return [ 
                    'id'        =>  $review->id,
                    'user'      =>  $review->user()->select('id','name')->get(),
                    'rating'    =>  $review->rating,
                    'reviews'   =>  $review->review,
                    'created'   =>  $review->created_at,
    
                ];
            })
        ];
    }
}
