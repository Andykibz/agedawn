<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CommentsCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function($comment){
                return [ 
                    'id'        =>  $comment->id,
                    'user'      =>  $comment->user()->select('id','name')->get(),
                    'comment'   =>  $comment->comment,
                    'created'   =>  $comment->created_at,
    
                ];
            })
        ];
    }
}
