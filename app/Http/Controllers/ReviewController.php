<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReviewsCollection;
use App\Review;
use Illuminate\Http\Request;
use App\Product;

class ReviewController extends Controller
{

    /**
     * @param Product $id
     * @return Response
     */
    public function getReviews( $p_id )
    {
        // $reviews = Product::find( $p_id )->reviews()->get();
        if ( Product::find($p_id)->reviews()->first() == NULL ){
            return response()->json([
                'ratings'   => 0,
                'reviews'   => [
                    'data'   => []
                ]
            ]);
        }

        $reviews = new ReviewsCollection( Product::find( $p_id )->reviews()->get() );
        $ratings =  Product::find( $p_id )->reviews()->pluck('rating')->toArray() ;
        $arr = array_filter($ratings, function($x) { return !empty($x); });
        return response()->json([
            'ratings'   => ( $arr ) ? array_sum($ratings)/count( $arr ) : null ,
            'reviews'   => $reviews
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeReview(Request $request,$prod_id)
    {
        if ( !auth()->user() ){
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        if ( !$prod = Product::find($prod_id) ){
            return response()->json(['error' => 'Product not Found'], 404);
        }

        

        if( $request->rating ){
            try {
                (int)$request->rating;
            } catch (\Throwable $th) {
                return response()->json([ 'error','invalid data type' ],422);
            }
        }
        $this->validate($request,[
            'review'    =>   'required',
            // 'rating'    =>   'nullable|numeric',
        ]);

        $review =  new Review();
        $review->user_id = auth()->user()->id;
        $review->product_id = $prod_id;
        $review->rating = ($request->rating!="null") ? $request->rating : NULL ;
        $review->review = $request->review;
        $review->save();

        return response()->json(TRUE);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deleteReview( Request $request, $review_id)
    {
        if ( !$user =  auth()->user() ){
            return response()->json(['error' => 'You have to be authenticated first'], 401);
        }else{
            
            if ($user->id ==  $request->user){
                Review::destroy($review_id);
            }else{
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        }

        return response()->json(TRUE);
    }
}
