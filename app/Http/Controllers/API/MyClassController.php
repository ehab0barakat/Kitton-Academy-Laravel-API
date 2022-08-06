<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
// use App\Http\Controllers\Controller\Auth;
use Illuminate\Support\Facades\Auth;
use App\Models\myClass;
use App\Models\Cllass;
use App\Models\NormalUser;
use App\Models\ClassContent;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Decimal;

class MyClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum', ["except" => [] ]);
    }
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
    public function store(Request $request , myClass $myclass)
    {
        // {
            // $fields = array();
            // foreach ($request->all() as $key => $value) {
            //     $fields[$key] = $value;
            // }
            // try {
            //     $data = myClass::insertGetId($fields);
            //     $data = myClass::find($data);
            //     $response = array(
            //         'data' => $data,
            //     );
            //     return response()->json($response);
            // } catch (\Exception $e) {
            //     $response = array(
            //         'status' => 'fail',
            //         'error' => $e->getMessage()
            //     );
            //     return response()->json($response, 400);
            // }
        // }
         $user_id = NormalUser::where("email", $request->user()->email)->first()->id ;
        return $myclass->create(["user_id" => $user_id , "class_id" => $request->class_id]) ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\myClass  $myClass
     * @return \Illuminate\Http\Response
     */
    public function show(myClass $myClass, $id)
    {

    if (Auth::check()) {
        return Cllass::rightJoin('myclass', 'myclass.class_id', '=', 'classes.id')->where('myclass.user_id', '=', $id)->select('classes.*')->get();

    }
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





    public function myClassRate(Request $request, myClass $myClass)
    {
        $checker = myClass::select('id')->where('user_id', $request->user()->id)->where('class_id', $request->class_id)->exists();
        if ($checker == null) {
            return myClass::create(['user_id'=>$request->user()->id,'rate'=> $request->rate,
        'class_id'=>$request->class_id]);
        } else {
            return myClass::where('user_id', $request->user()->id)
                ->where('class_id', $request->class_id)
                ->update(['rate' => $request->rate]);
        }
    }





    public function totalRating(myClass $myClass, $id)
    {
        $count=myClass::where('class_id', $id)->count();
        $total=0;
        $rates=myClass::select('rate')->where('class_id', $id)->get();
        foreach ($rates as $rate) {
            $total+=(($rate->rate/$count));

        }
        return round($total);
    }





    public function class_owner_check (Request $request , $id){
        $class_exists = Cllass::find($id) ;
        if($class_exists ){
            if($request->user()->role == 1 && $class_exists->isActive == 1){
                $user_id =  NormalUser::where("email", $request->user()->email)->first()->id ;
                $class_id = $id;
                $rows = myClass::where("class_id", $class_id)
                                ->where("user_id", $user_id)
                                ->get();
                if(count($rows) > 0){
                    return ["own" => true];
                }else{
                    return ["own" => false];
                }
            }
        } if($request->user()->role == 2  && $class_exists->isActive == 1){
            if( Cllass::find($id)->teacher_id == Teacher::where("email", $request->user()->email)->first()->id){
             return ["own" => true];
            }else{
             return ["own" => false];
            }
        } if($request->user()->role == 3 ){
            return ["own" => true];
        }else{
            return ["valid" =>false];
        }

    }






    public function video_owner_check (Request $request , $id){
        $video_exists = ClassContent::find($id) ;
        if($video_exists){
            $class_id = ClassContent::find($id)->class_id;
            if($request->user()->role == 1&& Cllass::find($class_id)->isActive == 1){

                $user_id = NormalUser::where("email", $request->user()->email)->first()->id ;
                $rows = myClass::where("class_id", $class_id)
                                ->where("user_id", $user_id)
                                ->get();
                if(count($rows) > 0){
                    return ["own" => true];
                }else{
                    return ["own" => false];
                }}
            elseif($request->user()->role == 2 && Cllass::find($class_id)->isActive == 1){
               if( Cllass::find($class_id)->teacher_id == Teacher::where("email", $request->user()->email)->first()->id){
                return ["own" => true];
                }else{
                return ["own" => false];
               }}
            elseif($request->user()->role == 3 ){
                return ["own" => true];}
        else{
            return ["valid" =>false];
        }
    }








}

}
