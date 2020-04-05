<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

/**
 * $order->products()->first()->pivot->product_count
 * $order->products()->attach(5,['product_count'=>4])
 */


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::paginate(7);
        return response()->json( $order );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function homeindex( )
    {
        $order = Order::take(4)->get();
        return response()->json( $order );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'name'          =>  'required',
            'location'      =>  'required',
            'phone'         =>  'required',
            'email'         =>  'required|email',
            'products'      =>  'required|array'
        ]);
        
        $order = new Order();
        $order->name         = $request->name;
        $order->phone        = $request->phone;
        $order->email        = $request->email;
        $order->location     = $request->location;
        $order->invoice      = $request->invoice;
        $order->user_id      = auth()->user() ?  auth()->user()->id : NULL ;
        $order->save();
        foreach ($request->products as $product) {
            $order->products()->attach($product['id'],['product_count'=>$product['quantity']]);
        }
        return response()->json(TRUE);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        return response()->json( $order );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
