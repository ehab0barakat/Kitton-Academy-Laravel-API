<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TeacherPostComment;
use Illuminate\Http\Request;

class TeacherPostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TeacherPostComment::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        
      return  TeacherPostComment::create($input)->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeacherPostComment  $teacherPostComment
     * @return \Illuminate\Http\Response
     */
    public function show(TeacherPostComment $teacherPostComment)
    {
        return $teacherPostComment;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeacherPostComment  $teacherPostComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeacherPostComment $teacherPostComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeacherPostComment  $teacherPostComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeacherPostComment $teacherPostComment)
    {
        //
    }
}
