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
        $this->middleware('auth:sanctum', ['except' => ['events_active' , "show" , "certian_teacher"]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(Auth::user()){
           return  Event::all() ;
        // }
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
    public function show(Event $event)
    {
        return $event ;
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
        return   Event::find($id)->update(["isActive",$request->is_active])->save(); ;
    }





















}
