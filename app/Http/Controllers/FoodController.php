<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
// use App\Database;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $food=Food::orderBy('', 'desc')->paginate(1);
        $food =Food::orderBy('class_food','desc')->paginate(2);
        // $food=Database::select('SELECT * FROM food');
        // orderBy('name', 'asc')->get();
        return response()->json(['data'=>$food], 200);
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
        // return $request;
        $this->validate ($request, [
            'class_food'=>'required',
            'source'=>'required',
            'meat'=>'required',
        ]);
        // return $foods;
        $food= new Food();
        $food->class_food=$request->input('class_food');
        $food->source=$request->input('source');
        $food->meat=$request->input('meat');
        $food->save();
        return response()->json($food, 201);
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
        $this->validate ($request, [
            'class_food'=>'required',
            'source'=>'required',
            'meat'=>'required',
        ]);
        // return $foods;
        $food=Food::where('id', $id)->first();
        $food->class_food=$request->input('class_food');
        $food->source=$request->input('source');
        $food->meat=$request->input('meat');
        $food->save();
        return response()->json($food, 201);
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
