<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cllass;
use App\Models\Teacher;
use App\Models\TeacherClassNotification;
use App\Models\ClassContent;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

class ClassController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum', ['except' => ["index" , "show"]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  Cllass::where("isActive",1)->get() ;
    }

    public function AllClasses()
    {
        return  Cllass::all() ;
    }

    public function make_class_active(Request $request ,Cllass $cllass , $id)
    {
        if($request->user()->role == 3){
            return   cllass::find($id)->update(["isActive" => $request->isActive]) ;
        }
    }

    public function teachers_classes(Request $request)
    {

        $teacher_id =Teacher::where("email", $request->user()->email)->first()->id;
        if( $request->user()->role == 2 ){
            return Cllass::where("teacher_id", $teacher_id)->get();
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        return Cllass::create($request->all())->save() ;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cllass  $cllass
     * @return \Illuminate\Http\Response
     */
    public function show(Cllass $cllass,$id)
    {

        return Cllass::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cllass  $cllass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cllass $cllass,$id)
    {

        return Cllass::find($id)->update($request->all());




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cllass  $cllass
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cllass $cllass,$id)
    {
        return Cllass::find($id)->delete();
    }



    public function notify_teacher (Request $request ){
        if( !TeacherClassNotification::where("class_id" , $request->class_id)->where("teacher_id" , $request->teacher_id)->first() &&
            $request->user()->role == 3 ){
                TeacherClassNotification::create($request->all())->save();
            }
    }

    public function notify_teacher_show (Request $request ){
        if($request->user()->role == 2 ){
            $teacher_id = Teacher::where("email",$request->user()->email)->first()->id ;
            $check =TeacherClassNotification::where("teacher_id",$teacher_id)->get() ;
            $array_of_ids = TeacherClassNotification::where("teacher_id",$teacher_id)->orderBy('created_at','DESC')->get() ;
            $data = [] ;
        $count = 0 ;
        foreach ($check as $value) {
            if ($value->check == 0){
                $count += 1 ;
            }
          }
        foreach ($array_of_ids as $value) {
            $x =  Cllass::find($value->class_id) ;
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
            TeacherClassNotification::find($id)->update(["check" => 1]);
        }
    }

}
