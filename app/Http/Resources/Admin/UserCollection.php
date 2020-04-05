<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function($user){
                return [ 
                    'id'            =>  $user->id,
                    'name'          =>  $user->name,
                    'email'         =>  $user->email,
                    'permissions'   =>  $user->permissions
                ];
            })
        ];
    }
}
