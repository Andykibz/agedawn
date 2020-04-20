<?php

namespace App\Http\Controllers;

use App\Http\Resources\MetaCollection;
use App\Http\Resources\MetaResource;
use App\Mail\ReachUs;
use App\Message;
use Illuminate\Http\Request;
use App\Meta;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMembers(){
        $members = Meta::where('type','members')->get();
        // return response()->json($members);
        return new MetaCollection( Meta::where('type','members')->get() );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAbout(){
        $about = Meta::where('type','about')->first();
        return new MetaResource( $about );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAccolades(){
        return new MetaCollection( Meta::where('type','accolades')->get() );
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDiscography(){
        return new MetaCollection( Meta::where('type','discography')->get() );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function contactus(Request $request){
        $request->validate([
            'name'          =>  'required',
            'email'         =>  'required|email',
            'subject'       =>  'required',
            'content'       =>  'required',
        ]);
          
        $msg = Message::create([
            'name'        =>  $request->name,
            'email'       =>  $request->email,
            'subject'     =>  $request->subject,
            'content'     =>  $request->content,
        ]);

        Mail::to('info@adawnage.com')->send( new ReachUs($msg) );

        return response()->json(TRUE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meta  $meta
     * @return \Illuminate\Http\Response
     */
    public function deleteMember($id)
    {
        return response()->json(Meta::destroy($id));
    }
}
