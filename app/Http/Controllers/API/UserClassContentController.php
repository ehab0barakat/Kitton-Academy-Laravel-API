<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UserClassContent;
use App\Models\NormalUser;
use App\Models\ClassContent;
use Illuminate\Http\Request;

class UserClassContentController extends Controller
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
    public function index()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    public function check_videos_seen(Request $request , $id)
    {
        $user_id = NormalUser::where("email", $request->user()->email)->first()->id ;
        $class_id = ClassContent::find($id)->class_id ;
        return UserClassContent::where("user_id", $user_id)->where("class_id",$class_id )->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserClassContent  $userClassContent
     * @return \Illuminate\Http\Response
     */
    public function show(UserClassContent $userClassContent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserClassContent  $userClassContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserClassContent $userClassContent , $id)
    {
        $is_normal=$request->user()->role == 1 ;
        $user_id = NormalUser::where("email", $request->user()->email)->first()->id ;
        $class_id = ClassContent::find($id)->class_id ;
        $recordExists = count(UserClassContent::where("user_id", $user_id)->where("video_id",$id )->get()) > 0 ;
        if($is_normal == 1 && $recordExists != 1 ){
            return UserClassContent::create(["user_id" => $user_id, "class_id" =>$class_id , "video_id" => $id , "seen" => 1])->save();
        }else{
            $views = $userClassContent->where("user_id", $user_id)->where("video_id",$id )->first()->seen ;
            $views += 1;
            return $userClassContent->where("user_id", $user_id)->where("video_id",$id )
                                    ->update(["user_id" => $user_id, "class_id" => $class_id , "video_id" => $id , "seen" => $views ]);
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserClassContent  $userClassContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserClassContent $userClassContent)
    {
        //
    }
}
