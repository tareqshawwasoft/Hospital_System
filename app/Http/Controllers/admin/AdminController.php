<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $patients = Patient::count();
        $doctors=Doctor::count();
        $admins=User::where('type','admin')->count();
        return view('admin.index', compact('patients','admins','doctors'));
    }
}
