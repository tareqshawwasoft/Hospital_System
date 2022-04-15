<?php

namespace App\Http\Controllers;

use App\Models\Appoinment;
use Illuminate\Http\Request;
use App\Models\AvailableTime;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;

class AppointmentsController extends Controller
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

        $current_user_id=Auth::user()->id;
        $patient_id=Patient::all()->where('user_id',$current_user_id)->first()->id;
        $availableTimeSelected=AvailableTime::all()->where('id',$request->available_id)->first();
        Appoinment::create([
            "doctor_id" => $availableTimeSelected->doctor_id,
            "patinet_id" => $patient_id,
            "available_time_id" => $request->available_id,
            "price" => $availableTimeSelected->price,
        ]);

        $avaTime = AvailableTime::find($request->available_id);
        $avaTime->status = 1;
        $avaTime->save();
        return redirect()->route('home')->with('msg', 'show added successfully')->with('type', 'success');

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
