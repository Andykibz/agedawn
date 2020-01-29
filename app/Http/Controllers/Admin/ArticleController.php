<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate(5);
        // $articles = Article::get();
        return response()->json($articles);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articles = Article::all();
        return response()->json(Article::all(),200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article    =   new Article();
        $this->validate($request,[
            'title'     => 'required',
            'body'      => 'required',
            'image' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:1999'
        ]);

        if($request->hasFile('image')):
            //Get Filename
            $img = $request->file('image');
            $fullname = $request->file('image')->getClientOriginalName();
            $name = pathinfo($fullname,PATHINFO_FILENAME );
            $ext = $request->file('image')->getClientOriginalExtension();
            $filename = $name.'_'.time().'.'.$ext;
            $img->storeAs('public/Articles',$filename);
            $path = public_path('storage/Articles/'.$filename);
            Image::make($path)->resize(800, 500, function($constraint) { $constraint->aspectRatio(); })->save($path,80);
            Image::make($path)->resize(400, 300, function($constraint) { $constraint->aspectRatio(); })->save(public_path('storage/Articles/thumbs/'.$filename),80);
            $article->cover_image = (!empty($filename)) ? $filename : null ;
        endif;     

        $article->title = $request->input('title');
        $article->headline = $request->input('headline');
        $article->body = $request->input('body');
        $article->slug = slugify(Article::class,$request->title);
        $article->published =  $request->input('published') ? TRUE: FALSE; 
        $article->published_at =  ( $request->input('published') !== null ) ? date("Y-m-d H:i:s") : null ; 
        $article->save();

        return response()->json($article);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {   
        return response()->json($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
