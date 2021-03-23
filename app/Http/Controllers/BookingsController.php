<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookings;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $bookings=Bookings::orderBy('name', 'desc')->get();
        $bookings=Bookings::all();
        // $bookings=Bookings::orderBy('title', 'desc')->get();
        return response()->json(['data' =>$bookings], 200);
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
        $this->validate($request, [
            'name'=>'required',
            'address'=>'required',
            'phone_no'=>'required',
            'email'=>'required',
        ]);
        // return 555;
        $bookings= new Bookings();
        $bookings->name=$request->input('name');
        $bookings->address=$request->input('address');
        $bookings->phone_no=$request->input('phone_no');
        $bookings->email=$request->input('email');
        // return bookings;
        $bookings->save();
        //  return 555;

        return response()->json($bookings, 201);
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
        $this->validate($request, [
            'name'=>'required',
            'address'=>'required',
            'phone_no'=>'required',
            'email'=>'required',
        ]);
        // return 555;
        $bookings=Bookings::where('id', $id)->first();
        $bookings->name=$request->input('name');
        $bookings->address=$request->input('address');
        $bookings->phone_no=$request->input('phone_no');
        $bookings->email=$request->input('email');
        return $bookings;
        $bookings->save();
        //  return 555;

        return response()->json($bookings, 201);
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
