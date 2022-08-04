<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UserPostLike;
use Illuminate\Http\Request;
use App\Models\NormalUser;

class UserPostLikeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum', ['except' => []]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        // return UserPostLike::all();
        // $likeArr=($likes->toArray());
        // return $likeArr;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        if(count(UserPostLike::where("user_id", $request->user_id)->where("post_id", $request->post_id)->get())==0)
        {
            return  UserPostLike::create($input)->save();

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserPostLike  $userPostLike
     * @return \Illuminate\Http\Response
     */
    public function show( Request $request,UserPostLike $userPostLike ,$id)
    {
        // return $userPostLike;
    //    return($id);
       $user = NormalUser::where("email",$request->user()->email)->first()->id ;
      $likes = UserPostLike::where('post_id',$id)->where('user_id',$user)->get();
        // return $likes;
         if(count( $likes)>0)
         {
            return ['liked'=>true];
         }
         else{
            return ['liked'=>false];
         }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserPostLike  $userPostLike
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPostLike $userPostLike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserPostLike  $userPostLike
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request,UserPostLike $userPostLike ,$id)
    {
        $user = NormalUser::where("email",$request->user()->email)->first()->id ;
       return UserPostLike::where('post_id',$id)->where('user_id',$user)->delete();


    }



     public function likes_count (Request $request ,$id)
    {
      
        return count(UserPostLike::where("post_id",$id)->get());

    }
}
