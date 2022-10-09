<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Items;
use PhpParser\Node\Stmt\Return_;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //returs all items from database
        return Items::all();
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
            'item-name' => 'required',
            'category-id' => 'required'
        ]);
        Return Items::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Items::find($id);
        if($item != null) {
            return $item;
        }else {
            return response()->json([
                'Item not found'
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
        $item = Items::find($id);
        if($item != null) {
            $item->update($request->all());
            return $item;
        }else {
            return response()->json([
                'Item not found'
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
        $item = Items::find($id);
        if($item != null) {
            $item->delete();
            return response()->json([
                'Item deleted'
            ]);
        }else {
            return response()->json([
                'Item not found'
            ],404);
        }
    }

    public function getItemsByCategory($id) {
     
        $categories = Categories::find($id);
           //check if there is a category with that id 
        if($categories == null){
            //if no category with that id = error message
            return response()->json([
                'category not found'
            ],404);
            //get all the items in category
            $item = Categories::find($id)->item;
            //return them
            return $item;
        }
    }

   
}
