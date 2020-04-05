<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meta;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listMembers(){
        $members = Meta::where('type','members')->get();
        return response()->json($members);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMember(Request $request)
    {
        
        $meta = new Meta();
        $validatedData = $request->validate([
          'name'        =>  'required',
          'image'       =>  'required|image|nullable|mimes:jpeg,png,jpg,gif,svg|max:1999',
          'role'         =>  'numeric'
          
        ]);

        $image = '';
        
        if($request->hasFile('image')):
          //Get Filename
          $img = $request->file('image');
          $fullname = $request->file('image')->getClientOriginalName();
          $name = pathinfo($fullname,PATHINFO_FILENAME );
          $ext = $request->file('image')->getClientOriginalExtension();
          $filename = $name.'_'.time().'.'.$ext;
          $img->storeAs('public/About',$filename);
          $path = storage_path("app/public/About/{$filename}");
          Image::make($path)->resize(800, 500, function($constraint) { $constraint->aspectRatio(); })->save($path,80);
          Image::make($path)->resize(400, 300, function($constraint) { $constraint->aspectRatio(); })->save(storage_path("app/public/About/thumbs/{$filename}"),80);
          $image = (!empty($filename)) ? $filename : null ;
        endif;

        $details = array(
            'name'      =>  $request->name,
            'role'      =>  $request->role,
            'image'     =>  $image
        );

        $meta->type         = 'members';
        $meta->name         = $request->input('name');
        $meta->slug         = slugify(Meta::class,$request->name);
        $meta->value        = json_encode( $details );

        return response()->json( $meta->save() );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateMember(Request $request, $id)
    {
        
        $meta = Meta::find( $id );
        $validatedData = $request->validate([
          'name'        =>  'required',
          'image'       =>  'required|image|nullable|mimes:jpeg,png,jpg,gif,svg|max:1999',
          'role'         =>  'numeric'
          
        ]);
        
        $image = '';
        
        if($request->hasFile('image')):
            
            $image = json_decode($meta->value)['image'];
            if( $image ):
                Storage::delete("public/About/{$image}");
                Storage::delete("public/About/thumbs/{$image}");
            endif;

            //Get Filename
            $img = $request->file('image');
            $fullname = $request->file('image')->getClientOriginalName();
            $name = pathinfo($fullname,PATHINFO_FILENAME );
            $ext = $request->file('image')->getClientOriginalExtension();
            $filename = $name.'_'.time().'.'.$ext;
            $img->storeAs('public/About',$filename);
            $path = storage_path("app/public/About/{$filename}");
            Image::make($path)->resize(800, 500, function($constraint) { $constraint->aspectRatio(); })->save($path,80);
            Image::make($path)->resize(400, 300, function($constraint) { $constraint->aspectRatio(); })->save(storage_path("app/public/About/thumbs/{$filename}"),80);
            $image = (!empty($filename)) ? $filename : null ;
        endif;

        $details = array(
            'name'      =>  $request->name,
            'role'      =>  $request->role,
            'image'     =>  $image
        );

        $meta->name         = $request->input('name');
        $meta->slug         = slugify(Meta::class,$request->name);
        $meta->value        = json_encode( $details );

        return response()->json( $meta->save() );
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
