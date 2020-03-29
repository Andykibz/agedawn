<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $category = \App\Category::get();
      // $articles = Article::get();
      return response()->json($category);

  }

  /**
     * Store a new category.
     *
     * @param  Request  $request
     * @return Response
     */
  public function store(Request $request)
  {
      $category = new \App\Category();
      $this->validate($request,[
          'name'     => 'required',
      ]);
      $category->name =  $request->name;
      $category->slug = slugify(Category::class,$request->name);
      $category->save();
      return response()->json(['status' => TRUE]);

  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $cat_id)
  {
      $category = \App\Category::find($cat_id);
      $category->name=$request->name;
      // $articles = Article::get();
      return response()->json($category->save());

  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function destroy($category_id)
  {
      
      // $articles = Article::get();
      return response()->json(\App\Category::destroy($category_id));

  }
}
