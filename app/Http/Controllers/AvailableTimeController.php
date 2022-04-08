<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\AvailableTime;
use Illuminate\Support\Facades\Date;
use SebastianBergmann\Environment\Console;

class AvailableTimeController extends Controller
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

        $arr_arrival= str_split($request->time_of_arrival, 2);
         $time=intval( $arr_arrival[0]);
        $arr_departure= str_split($request->time_of_departure, 2);
        $count = $arr_departure[0]-$arr_arrival[0];

        for($i=1;$i<=$count;$i++){
            $time +=1;
        AvailableTime::create([
            "doctor_id" => $request->doctor_id,
            "price" => $request->price,
            "date_from" => $request->date_of_arrival . ' ' . $time . ':00' ,
            "date_to" => $request->date_of_arrival . ' ' . $time +1 .':00',
        ]);}
        return redirect()->route('home')->with('msg', 'Available time added successfully')->with('type', 'success');

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
}
