<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Article;
use App\Http\Resources\CommentsCollection;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Http\Resources\PostCollection;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = new PostCollection(
            Article::where('type','article')->orderBy('id','desc')->paginate(7)
        );
        // $articles = Article::where('type','article')->orderBy('id','desc')->paginate(7);
        return response()->json( $articles );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function homeindex( )
    {
        // $articles = Article::where('type','article')->take(2)->orderBy('id','desc')->get();
        $articles = new PostCollection( 
            Article::where('type','article')->take(2)->orderBy('id','desc')->paginate(2)
         );
        $weeklies = new PostCollection(
            Article::where('type','weekly')->take(4)->orderBy('id','desc')->paginate(4)
        );
        // $weeklies = Article::where('type','weekly')->take(4)->orderBy('id','desc')->get();
        return response()->json( [
            'articles'       => $articles,
            'weeklies'      => $weeklies,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function homeweeklies()
    {
        
        $weeklies = Article::where('type','weekly')->take(5)->orderBy('id','desc')->get();
        return response()->json( $weeklies );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showWeekly($id)
    {
        $article = Article::find($id);
        
        return response()->json( new PostResource( $article ) );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getComments()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeComments(Request $request, $article_id )
    {
        if ( !auth()->user() ){
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        if ( !$article = Article::find($article_id) ){
            return response()->json(['error' => 'Product not Found'], 404);
        }

        $this->validate($request,[
            'comment'    =>   'required'
        ]);
        
        $comment =  new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->article_id = $article_id;
        $comment->comment = $request->comment;
        $comment->save();

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
        $article = Article::find($id);
        $comments = new CommentsCollection( $article->comments()->get() );
        return response()->json( [
            'article'       => $article,
            'comments'      => $comments,
        ] );
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
    public function destroyComment(Request $request, $coment)
    {
        if ( !$user = auth()->user() ){
            return response()->json(['error' => 'You have to be authenticated first'], 401);
        }else{
            
            if ($user->id ==  $request->user ){
                Comment::destroy($coment);
            }else{
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        }

        return response()->json(TRUE);
    }
}
