<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OrdersCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function($order){
                return [ 
                    'id'        =>  $order->id,
                    'name'      =>  $order->name,
                    'email'     =>  $order->email,
                    'phone'     =>  $order->phone,
                    'invoice'   =>  $order->invoice,
                    'products'  =>  $order->products()->get(),
                    'created'   =>  $order->created_at,

                ];
            })
        ];
    }
}
