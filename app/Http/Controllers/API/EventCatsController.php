<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\EventCategory;
use Illuminate\Http\Request;
use App\Models\Event;


class EventCatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  EventCategory::all() ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventCategory  $eventCategory
     * @return \Illuminate\Http\Response
     */
    public function show(EventCategory $eventCategory , $id)
    {
        // return  EventCategory::find($id) ;
        return Event::where("eventCat_id", $id )->get() ;
        // return Event::all() ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventCategory  $eventCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventCategory $eventCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventCategory  $eventCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventCategory $eventCategory)
    {
        //
    }
}
