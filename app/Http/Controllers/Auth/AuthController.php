<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $user = User::create([
             'name'     => $request->name,
             'email'    => $request->email,
             'password' => $request->password,
         ]);

        $token = auth()->login($user);

        return $this->respondWithToken($token);
    }

    public function signin()
    {
        $oauth = User::where('email', request('email'))->first()->pluck('oauth')[0];
        if( $oauth ){ return response()->json(['error' => 'Unauthorized'], 401); }
        
        $credentials = request(['email', 'password']);
        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function signout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            // 'expires_in'   => auth()->factory()->getTTL() * 60
        ]);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getuser()
    {
        $user = auth()->user();
        return response()->json([
            'name'      =>  $user->name,
            'email'     =>  $user->email
        ]);
    }

    /**
     * Get user authenticated via Google
     * @param array profile
     */
    public function googleAuthenticate(Request $request){

        $request->validate([
            'id'    => 'required',
            'name'  => 'required',
            'email' => 'required|email',
        ]);

        $user =  User::firstOrCreate([
            'email'     => $request->email
        ],[
            'name'  => $request->name,
            'password'  => Hash::make( $request->id ),
            'oauth'  => 1,
        ]);

        $token = auth()->login($user);

        return $this->respondWithToken($token);
    }
//     /**
//      * Create a new AuthController instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         $this->middleware('auth:api', ['except' => ['login']]);
//     }

//     /**
//      * Get a JWT via given credentials.
//      *
//      * @return \Illuminate\Http\JsonResponse
//      */
//     public function login()
//     {
//         $credentials = request(['email', 'password']);

//         if (! $token = auth()->attempt($credentials)) {
//             return response()->json(['error' => 'Unauthorized'], 401);
//         }

//         return $this->respondWithToken($token);
//     }

    

//     /**
//      * Log the user out (Invalidate the token).
//      *
//      * @return \Illuminate\Http\JsonResponse
//      */
//     public function logout()
//     {
//         auth()->logout();

//         return response()->json(['message' => 'Successfully logged out']);
//     }

//     /**
//      * Refresh a token.
//      *
//      * @return \Illuminate\Http\JsonResponse
//      */
//     public function refresh()
//     {
//         return $this->respondWithToken(auth()->refresh());
//     }

//     /**
//      * Get the token array structure.
//      *
//      * @param  string $token
//      *
//      * @return \Illuminate\Http\JsonResponse
//      */
//     protected function respondWithToken($token)
//     {
//         return response()->json([
//             'access_token' => $token,
//             'token_type' => 'bearer',
//             'expires_in' => auth()->factory()->getTTL() * 60
//         ]);
//     }
}
