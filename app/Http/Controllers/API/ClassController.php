<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cllass;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  Cllass::all() ;
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
        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cllass  $cllass
     * @return \Illuminate\Http\Response
     */
    public function show(Cllass $cllass)
    {
        return $cllass;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cllass  $cllass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cllass $cllass)
    {
        return $cllass->update($request->all());
        // return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cllass  $cllass
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cllass $cllass)
    {
        return $cllass->delete();
    }
}
