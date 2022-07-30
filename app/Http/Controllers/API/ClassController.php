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

    
}
