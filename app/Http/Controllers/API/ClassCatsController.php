<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\ClassCat;
use App\Models\Cllass;
use Illuminate\Http\Request;

class ClassCatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  ClassCat::all() ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return ClassCat::create($request->all())->save() ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassCat  $classCat
     * @return \Illuminate\Http\Response
     */
    public function show(ClassCat $classCat, $id)
    {

        return Cllass::where("classCat_id", $id)->get() ;



    }
    public function classcat(ClassCat $classCat, $id)
    {
        return  ClassCat::find($id) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassCat  $classCat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassCat $classCat,$id)
    {
   return ClassCat::find($id)->update($request->all());


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassCat  $classCat
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassCat $classCat,$id)
    {
        return ClassCat::find($id)->delete();
    }

}
