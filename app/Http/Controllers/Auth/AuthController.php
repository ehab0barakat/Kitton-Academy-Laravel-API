<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\NormalUser;
use App\Models\Teacher;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum', ['except' => ['login' , "signupuser" ,"signupteacher"]]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function login(Request $request)
    {
        $credentials = $request->only(['email' , 'password']);
        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return ["token" => request()->user()->createToken("api")->plainTextToken];
    }


    public function signupuser(Request $request)
    {

       if (count(User::where("email", $request->email)->get()) > 0 ){
           return [ "message" =>"this email is taken :( "] ;
        }else{
            User::create([
               "name" => $request->ParentName ,
               "email" => $request->email ,
               "password" => Hash::make($request->password),
               "role" => "1"
           ])->save();
            NormalUser::create($request->all())->save();
            return [ "message" =>"redirecting to homepage :) "] ;
        }
    }


    public function signupteacher(Request $request)
    {
       if (count(User::where("email", $request->email)->get()) > 0 ){
           return [ "message" =>"this email is taken :( "] ;
        }else{
            User::create([
               "name" => $request->name ,
               "email" => $request->email,
               "password" => Hash::make($request->password),
               "role"=> "2"
           ])->save();
            Teacher::create($request->all())->save();
            return [ "message" =>"redirecting to homepage :)"] ;
        }
    }



    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {

        $role =  auth()->user()->role ;
        $email = auth()->user()->email ;

        if($role == 1){
            return NormalUser::where("email",$email)->first();
        }elseif($role == 2){
            return Teacher::where("email",$email)->first();
        }elseif($role == 3){
            return Admin::where("email",$email)->first();
        }else{
            return ["name","guest" ,
                    "role" , "0"] ;
        }


    }




    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
