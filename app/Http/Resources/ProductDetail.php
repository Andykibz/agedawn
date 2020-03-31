<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetail extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'slug'          => $this->slug,
            'category'      => $this->category->name,
            'description'   => $this->description,
            'quantity'      => $this->quantity,
            'price'         => $this->price,
            'image'         => $this->image,
            'created_at'    => $this->created_at,
        ];
    }
}
