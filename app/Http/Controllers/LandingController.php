<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appoinment;
use Illuminate\Http\Request;
use App\Models\AvailableTime;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Auth::user()->type == 'admin'){
            return view('admin-home');
        }
        elseif(Auth::user()->type == 'doctor'){
            $doctors = Doctor::get();
            $available= AvailableTime::all()->where('status','0');
            return view('doctor-home', compact('doctors','available'));
        }
        else{
        $doctors = Doctor::get();
        $patient = Patient::get();
        $available= AvailableTime::all()->where('status','0');
        $appointment= Appoinment::all()->where('patinet_id',$patient->where('user_id',Auth::id())->first()->id)->first();

        return view('patient-home', compact('doctors','available','patient','appointment'));
        }

    }

}
