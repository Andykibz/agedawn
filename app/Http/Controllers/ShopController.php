<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductDetail;

class ShopController extends Controller
{
    /**
     * @param string $name
     * @return \Illuminate\Http\Response
     */
    public function getByCatName($name){
        return response()->json( Category::where('slug',$name)->with('products')->get()->pluck('products'));
    }

    /**
     * @param string $name
     * @return \Illuminate\Http\Response
     */
    public function getProduct($id){
        return new ProductDetail( Product::find($id) );
        
        // return response()->json( Product::find($id)->get() );
    }

}
