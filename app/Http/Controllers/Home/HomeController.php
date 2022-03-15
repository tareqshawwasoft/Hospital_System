<?php

namespace App\Http\Controllers\Home;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $departments = Department::orderBy('id', 'desc')->paginate(5);
        return view('index', compact('departments'));
    }
}
