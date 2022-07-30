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
//
}



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {

            $fields = array();
            foreach ($request->all() as $key => $value) {
                $fields[$key] = $value;
            }
            try {

                $data = myClass::insertGetId($fields);
                $data = myClass::find($data);

                $response = array(
                    'data' => $data,
                );
                return response()->json($response);
            } catch (\Exception $e) {
                $response = array(
                    'status' => 'fail',
                    'error' => $e->getMessage()
                );
                return response()->json($response, 400);
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\myClass  $myClass
     * @return \Illuminate\Http\Response
     */
    public function show( myClass $myClass, $id)
    {

     return Cllass::rightJoin('myclass', 'myclass.class_id', '=', 'classes.id')->select('classes.*')->get();
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
