<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Teacher;
use App\Models\UserEvent;
use Illuminate\Http\Request;
use Auth ;

class EventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum', ['except' => ['events_active'  , "certian_teacher", "users_Count" ,"single" ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->user()->role == 3){
            return  Event::all() ;
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
        return Event::create($request->all())->save() ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request  ,$id)
    {
        if(Event::find($id)->isActive == 1 ||
           $request->user()->role == 3 ||
           Teacher::where("email", $request->user()->email)->first()->id == Event::find($id)->teacher_id){
            return Event::find($id) ;
          }else{
            return ["valid" => false] ;
        }
    }

    public function single(Request $request ,Teacher $teacher , Event $event , $id)
    {
        if($event->find($id)->isActive == 1){
             return $event->find($id) ;
            }else{
                return ["valid" => false] ;
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        return $event->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        return $event->delete();
    }


    public function events_nonactive(Event $event)
    {
        return Event::where("isActive", 0 )->get();
    }


    public function events_active(Event $event)
    {
        return Event::where("isActive", 1 )->get();
    }


    public function teacher_events (Request $request , Event $event)
    {
        return Event::where("teacher_id", $request->id)->get()  ;
    }


    public function events_for_users (Request $request ,UserEvent $userEvent)
    {
        return UserEvent::where("user_id", $request->id)->get()  ;
    }




    public function event_inroll (Request $request ,UserEvent $userEvent)
    {
        return UserEvent::create($request->all())  ;
    }





    public function event_outroll (Request $request ,UserEvent $userEvent ,)
    {
        return UserEvent::where("user_id", $request->user_id)
                        ->where("event_id", $request->event_id)
                        ->delete()  ;

    }



    public function search_inrollement (Request $request ,UserEvent $userEvent ,)
    {
        return UserEvent::where("user_id", $request->user_id)
                        ->where("event_id", $request->event_id)
                        ->get();

    }




    public function users_Count (UserEvent $userEvent , $id)
    {
        return count(UserEvent::where("event_id", $id)->get()) ;
    }




    public function certian_teacher (Teacher $teacher , $id)
    {
        return   Teacher::find($id) ;
    }


    public function change_state (Event $event , Request $request , $id)
    {
        if($request->user()->role == 3){
            return   Event::find($id)->update(["isActive",$request->is_active])->save(); ;
        }
    }



    public function search_for_teacher_events (Event $event , Request $request )
    {
        if($request->user()->role == 3){
            if(count(Teacher::where("email",$request->email)->get())  > 0){
                return  Event::where("teacher_id",Teacher::where("email",$request->email)->first()->id)->get() ;
            }else{
                return  ["message" => "there is no teacher with that email"] ;
            }

        }
    }





















}
