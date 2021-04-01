<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('Products');
    }
    public function index()
    {
        $products=products::all();
        // ::with('Category');
        return response()->json($products, 200);
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
        // return 555;
        $this->validate($request, [
           'name'=>'required',
           'description'=>'required',
           'image'=>'nullable',
           'price'=>'required',
           'quantity'=>'required',
           'size'=>'required',
        //    'category_id'=>'null',

        ]);
        // return $products;
        $products=new products();
        $products->name=$request->input('name');
        $products->description=$request->input('description');
        $products->image=$request->input('image');
        $products->price=$request->input('price');
        $products->quantity=$request->input('quantity');
        $products->size=$request->input('size');
        // $products->category_id=$request->input('category_id');
        $products->save();
        return response()->json($products, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        // return 555;
        $this->validate($request, [
            'name'=>'required',
           'description'=>'required',
           'image'=>'nullable',
           'price'=>'required',
           'quantity'=>'required',
           'size'=>'required',
        //    'category_id'=>'null',

        ]);
        // return $products;
        $products=products::find($id);
        $products->name=$request->input('name');
        $products->description=$request->input('description');
        $products->image=$request->input('image');
        $products->price=$request->input('price');
        $products->quantity=$request->input('quantity');
        $products->size=$request->input('size');
        // $products->category_id=$request->input('category_id');
        $products->update();
        return response()->json($products, 403);
    
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
}
