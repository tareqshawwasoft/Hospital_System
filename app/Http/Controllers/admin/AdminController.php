<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {

        // if(Auth::user()->type == 'patient') {
        //     return redirect('/');
        // }

        // dd(Auth::user());
        return view('admin.index');
    }
}
