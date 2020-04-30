<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function($post){
                return [ 
                    'id'        => $post->id,
                    'title'     =>  $post->title,
                    'headline'  =>  $post->headline,
                    'image'     =>  $post->image,
                    'slug'      =>  $post->slug,
                    'tags'  => $post->tags()->get(),
                    'created_at'=>  $post->created_at,
                ];
            }),
            'pagination' => [
                'total' => $this->total(),
                'count' => $this->count(),
                'per_page' => $this->perPage(),
                'current_page' => $this->currentPage(),
                'last_page' => $this->lastPage()
            ],
        ];
    }
}
