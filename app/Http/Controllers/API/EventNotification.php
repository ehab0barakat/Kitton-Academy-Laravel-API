<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Teacher;
use App\Models\TeacherEventNotification;
use App\Models\UserEventNotification;
use App\Models\UserEvent;
use Auth ;


class EventNotification extends Controller
{



    public function __construct()
    {
        $this->middleware('auth:sanctum', ['except' => []]);
    }



    public function create (Request $request ){
        // return $request->teacher_id ;
        if( !TeacherEventNotification::where("event_id" , $request->event_id)->where("teacher_id" , $request->teacher_id)->first() &&
            $request->user()->role == 3 ){
                TeacherEventNotification::create($request->all())->save();
            }
    }

    public function show (Request $request ){
        if($request->user()->role == 2 ){
            $teacher_id = Teacher::where("email",$request->user()->email)->first()->id ;
            $check =TeacherEventNotification::where("teacher_id",$teacher_id)->get() ;
            $array_of_ids = TeacherEventNotification::where("teacher_id",$teacher_id)->orderBy('updated_at','DESC')->get() ;
            $data = [] ;
        $count = 0 ;
        foreach ($check as $value) {
            if ($value->check == 0){
                $count += 1 ;
            }
          }
        foreach ($array_of_ids as $value) {
            $x =  Event::find($value->event_id) ;
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


    public function update (Request $request , $id ){
        if( $request->user()->role == 2 ){
            TeacherEventNotification::find($id)->update(["check" => 1]);
        }
    }









}
