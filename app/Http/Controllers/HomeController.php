<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\AvailableTime;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $doctors = Doctor::get();
        $patient = Patient::get();
        $available= AvailableTime::all()->where('status','0');
        // dd($available);
        // dd($doctors);
        return view('home', compact('doctors','available','patient'));
    }
}
