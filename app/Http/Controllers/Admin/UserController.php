<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\UserCollection;
use App\Meta;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Contracts\Permission;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $users = new UserCollection( User::get() ) ;
        $accessCtl = Meta::where('slug','accesscontrol')->first();
        return response()->json([ 'users' => $users, 'access' => $accessCtl ]);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function enforce( Request $request ){
        $request->validate([
            'access'    => 'boolean'
        ]);
        $accessCtl = Meta::where('slug','accesscontrol')->first();
        $accessCtl->value = $request->access;
        $accessCtl->save();
        return response()->json(True);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function assignPermissions( Request $request, $user_id ){
        $this->validate($request,[
            'permissions'        =>  'array',
          ]);
        if(auth()->user()->hasPermissionTo('elevated_backend_access')){
            $user = User::find( $user_id );
            $user->syncPermissions( $request->permissions );
            return response()->json($request->permissions);
        }else{
            return response()->json(['error' => 'Unauthorized'], 401);
        }

    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
      return response()->json(User::destroy($user_id));

    }
}
