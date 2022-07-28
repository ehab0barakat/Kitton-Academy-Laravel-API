<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Auth ;

class EventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum', ['except' => ['index' , "show"]]);
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
}
