<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;
Use App\Models\Categories;
use App\Models\Category;
use PhpParser\Node\Stmt\Return_;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //returns all categories from database
        return Categories::all();
    }

   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category-name' => 'required'
        ]);
        Return Categories::create($request->all());
    }

    public function show($id)
    {
        $item = Categories::find($id);
        if($item != null) {
            return $item;
        }else {
            return response()->json([
                'Category not found'
            ],404);
        }
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
        $category = Categories::find($id);
        if($category != null) {
            $category->update($request->all());
            return $category;
        }else {
            return response()->json([
                'Category not found'
            ],404);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::find($id);
        if($category != null) {
            $category->delete();
            return response()->json([
                'category deleted'
            ]);
        }else {
            return response()->json([
                'category not found'
            ],404);
        }
    }

  
}