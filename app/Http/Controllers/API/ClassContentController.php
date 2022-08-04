<?php

namespace App\Http\Controllers\API;

use App\Models\Cllass;
use App\Models\Teacher;
use App\Http\Controllers\Controller;
use App\Models\ClassContent;
use Illuminate\Http\Request;

class ClassContentController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth:sanctum', ['except' => ["index"]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request , $id)
    {
        return ClassContent::where("class_id" , $id )->get() ;
    }


    public function indox (Request $request , $id)
    {
        $class_id = ClassContent::find($id )->class_id ;
        return ClassContent::where("class_id" , $class_id )->get() ;
    }


    public function create(Request $request)
    {
        return ClassContent::create($request->all())->save() ;
    }

    public function check_class_permission(Request $request , $id)
    {
        if(Cllass::find($id)){
            if($request->user()->role == 2 ){
                $x = Cllass::find($id)->teacher_id ;
                $y = Teacher::where("email", $request->user()->email)->first()->id  ;
                if($x == $y){
                    return ["valid" => true] ;
                }else{
                    return ["valid" => false] ;
                }
            }else if($request->user()->role == 3 ){
                return ["valid" => true] ;
            }
        }else{
            return ["valid" => false] ;
        }

    }

    public function check_video_permission(Request $request , $id)
    {
        if(ClassContent::find($id)){
            if($request->user()->role == 2 ){
                $z = ClassContent::find($id)->class_id;
                $x = Cllass::find($z)->teacher_id ;
                $y = Teacher::where("email", $request->user()->email)->first()->id  ;
                if($x == $y){
                    return ["valid" => true] ;
                }else{
                    return ["valid" => false] ;
                }
            }
            if($request->user()->role == 3 ){
                return ["valid" => true] ;
            }
        }else{
            return ["valid" => false] ;
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassContent  $classContent
     * @return \Illuminate\Http\Response
     */
    public function show(ClassContent $classContent , $id)
    {
        return ClassContent::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassContent  $classContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassContent $classContent , $id)
    {
        return ClassContent::find($id)->update($request->all()) ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassContent  $classContent
     * @return \Illuminate\Http\Response
     */
    public function delete(ClassContent $classContent , $id)
    {
        return ClassContent::find($id)->delete();
    }
}
