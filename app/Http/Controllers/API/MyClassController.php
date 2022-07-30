<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
// use App\Http\Controllers\Controller\Auth;
use Illuminate\Support\Facades\Auth;
use App\Models\myClass;
use App\Models\Cllass;
use App\Models\NormalUser;
use Illuminate\Http\Request;

class MyClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return Cllass::all()->where("user_id" , NormalUser::user()->id);
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\myClass  $myClass
     * @return \Illuminate\Http\Response
     */
    public function show(myClass $myClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\myClass  $myClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, myClass $myClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\myClass  $myClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(myClass $myClass)
    {
        //
    }
}
