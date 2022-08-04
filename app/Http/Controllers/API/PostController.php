<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\Post;
use App\Models\TeacherPostNotification;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum', ['except' => ["show_active_posts" ]]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // to get all posts
        return Post::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create(Request $request)
    // {

    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $teacher_id = Teacher::where("email", $request->user()->email)->first()->id;
        return Post::create(["title" => $request->title ,
                            "isActive" => 0 ,
                            "image" => $request->image ,
                            "description" => $request->description ,
                            "teacher_id" => $teacher_id
                            ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return $post;
    }
    public function all_teacher_posts(Post $post,Request $request )
    {
        $teacher_id = Teacher::where("email", $request->user()->email)->first()->id;

        return $post->where("teacher_id",$teacher_id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    // public function edit(Post $post)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post , $id)
    {
        $teacher_id = Teacher::where("email", $request->user()->email)->first()->id;
        return Post::find($id)->update(["title" => $request->title ,
                            "isActive" => 0 ,
                            "image" => $request->image ,
                            "description" => $request->description ,
                            "teacher_id" => $teacher_id
                            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        return $post->delete();
    }



    public function show_active_posts (Request $request , Post $post)
    {
        return Post::where("isActive", 1 )->get();
    }




    public function notify_teacher (Request $request ){
        if( !TeacherPostNotification::where("post_id" , $request->post_id)->where("teacher_id" , $request->teacher_id)->first() &&
            $request->user()->role == 3 ){
                TeacherPostNotification::create($request->all())->save();
            }
    }

    public function notify_teacher_show (Request $request ){
        if($request->user()->role == 2 ){
            $teacher_id = Teacher::where("email",$request->user()->email)->first()->id ;
            $check =TeacherPostNotification::where("teacher_id",$teacher_id)->get() ;
            $array_of_ids = TeacherPostNotification::where("teacher_id",$teacher_id)->orderBy('created_at','DESC')->get() ;
            $data = [] ;
        $count = 0 ;
        foreach ($check as $value) {
            if ($value->check == 0){
                $count += 1 ;
            }
          }
        foreach ($array_of_ids as $value) {
            $x =  Post::find($value->post_id) ;
            array_push($data,$x) ;
          }

        if( $request->user()->role == 2 ){
            return ["data" =>   $data ,
                        "check" =>   $check ,
                        "count" => $count
                       ];
        }
    }
    }




    public function notify_teacher_update (Request $request , $id ){
        if( $request->user()->role == 2 ){
            TeacherPostNotification::find($id)->update(["check" => 1]);
        }
    }



    public function make_post_active(Request $request  , $id)
    {
        if($request->user()->role == 3){
            return   Post::find($id)->update(["isActive" => $request->isActive]) ;
        }
    }

}
