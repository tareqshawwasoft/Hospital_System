<?php

namespace App\Http\Controllers\Home;

use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        $doctors = Doctor::orderBy('id', 'desc')->paginate(5);
        return view('index', compact('departments','doctors'));
    }
    function doctorsOfDepartment($id)
    {
        $department=Department::where('id', $id)->get()->first();
        $doctors=Doctor::where('department_id',$id)->orderBy('id')->get();
        return view('doctorsOfDepartment', compact('doctors','department'));
    }
}
