<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\NormalUser;
use Illuminate\Http\Request;

class NormalUserController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NormalUser  $normalUser
     * @return \Illuminate\Http\Response
     */
    public function show(NormalUser $normalUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NormalUser  $normalUser
     * @return \Illuminate\Http\Response
     */
    public function edit(NormalUser $normalUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NormalUser  $normalUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NormalUser $normalUser)
    {
        return $normalUser->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NormalUser  $normalUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(NormalUser $normalUser)
    {
        //
    }
}
