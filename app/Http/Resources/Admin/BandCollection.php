<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BandCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'data' => $this->collection->transform(function($member){
                return [ 
                    'id'        =>  $member->id,
                    'name'      =>  $member->name,
                    'role'     =>  json_decode($member->value)->role,
                    'image'     =>  json_decode($member->value)->image,
                ];
            })
        ];
    }
}
