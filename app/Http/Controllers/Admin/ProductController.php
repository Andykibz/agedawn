<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Http\Resources\ProductCollection;

class ProductController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $products = new ProductCollection(Product::paginate(3));
    // return new ProductCollection(Product::paginate(3));
    return response()->json($products);

    // return Product::paginate(3);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    $product = new Product();
    $request->validate([
      'name'        =>  'required',
      'image'       =>  'required|image|nullable|mimes:jpeg,png,jpg,gif,svg|max:1999',
      'category_id' =>  'numeric'
      // 'sku_num'     =>  'required|unique:App\Product',
      // 'quantity'    =>  'required|numeric',
      // 'price'       =>  'required|numeric',
    ]);

    if ($request->hasFile('image')) :
      //Get Filename
      $img = $request->file('image');
      $fullname = $request->file('image')->getClientOriginalName();
      $name = pathinfo($fullname, PATHINFO_FILENAME);
      $ext = $request->file('image')->getClientOriginalExtension();
      $filename = $name . '_' . time() . '.' . $ext;
      $img->storeAs('public/Products', $filename);
      $path = storage_path("app/public/Products/{$filename}");
      Image::make($path)->resize(960, 720, function ($constraint) {
        $constraint->aspectRatio();
      })->save($path, 100);
      Image::make($path)->resize(480, 360, function ($constraint) {
        $constraint->aspectRatio();
      })->save(storage_path("app/public/Products/thumbs/{$filename}"), 80);
      $product->image = (!empty($filename)) ? $filename : null;
    endif;


    $product->name        = $request->input('name');
    $product->sku_num     = $request->input('sku_num');
    $product->slug        = slugify(Product::class, $request->name);
    $product->category_id = $request->input('category_id');
    $product->quantity    = $request->input('quantity');
    $product->description = $request->input('description');
    $product->price       = $request->input('price');

    return response()->json($product->save());
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function edit($product_id)
  {
    $product = Product::find($product_id);
    return  response()->json($product);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $product_id)
  {
    $product = Product::find($product_id);
    $this->validate($request, [
      'name'        =>  'required',
      // 'image'       =>  'image|mimes:jpeg,png,jpg,gif,svg|max:1999',
      'quantity'    =>  'required|numeric',
      'price'       =>  'required|numeric',
    ]);

    if ($request->hasFile('image')) :
      //Get Filename

      if (!empty($product->image)) :
        Storage::delete("public/Products/{$product->image}");
        Storage::delete("public/Products/thumbs/{$product->image}");
      endif;

      $img = $request->file('image');
      $fullname = $request->file('image')->getClientOriginalName();
      $name = pathinfo($fullname, PATHINFO_FILENAME);
      $ext = $request->file('image')->getClientOriginalExtension();
      $filename = $name . '_' . time() . '.' . $ext;
      $img->storeAs('public/Products', $filename);
      $path = storage_path("app/public/Products/{$filename}");
      Image::make($path)->resize(1024, 768, function ($constraint) {
        $constraint->aspectRatio();
      })->save($path, 100);
      Image::make($path)->resize(480, 360, function ($constraint) {
        $constraint->aspectRatio();
      })->save(storage_path("app/public/Products/thumbs/{$filename}"), 90);
      $product->image = (!empty($filename)) ? $filename : null;
    endif;

    $product->name        = $request->input('name');
    $product->sku_num     = $request->input('sku_num');
    $product->category_id = $request->input('category_id');
    $product->quantity    = $request->input('quantity');
    $product->description = $request->input('description');
    $product->price       = $request->input('price');



    return response()->json($product->save());
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function destroy($product_id)
  {
    return response()->json(Product::destroy($product_id));
  }
}
