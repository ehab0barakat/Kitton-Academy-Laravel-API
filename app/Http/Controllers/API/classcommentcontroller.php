<?php

namespace App\Http\Controllers\API;
use App\Models\classcomment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class classcommentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return classcomment::all();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(classcomment $id)
    {
    return $id;
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function class_user_comment(Request $request)
{
    $input = $request->all();

 return  classcomment::create($input)->save();

}
public function comments_count (Request $request ,$id)
    {


        return classcomment::where('class_id', $id)->count();

    }

}
