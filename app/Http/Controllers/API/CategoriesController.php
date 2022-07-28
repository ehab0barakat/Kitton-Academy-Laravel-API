<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProductsCategory;
use Illuminate\Http\Request;
use App\Models\Product;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  ProductsCategory::all() ;
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
     * @param  \App\Models\ProductsCategory  $productsCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductsCategory $productsCategory , $id)
    {
        return Product::where("cat_id", $id )->get() ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductsCategory  $productsCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductsCategory $productsCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductsCategory  $productsCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductsCategory $productsCategory)
    {
        //
    }
}
