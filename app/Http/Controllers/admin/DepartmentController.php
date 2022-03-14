<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $departments = Department::latest()->paginate(2);
        $departments = Department::orderBy('id', 'desc')->paginate(5);
        // dd($departments);
        return view('admin.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd( $request->all() );
        $names_en = $request->name_en;
        $names_ar = $request->name_ar;
        $i = 0;
        foreach($request->name_en as $name) {
            Department::create([
                'name_en' => $names_en[$i],
                'name_ar' => $names_ar[$i],
            ]);
            $i++;
        }

        return redirect()->route('admin.departments.index')->with('msg', 'Department added successfully')->with('type', 'success');
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
        Department::find($id)->update([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
        ]);

        return redirect()->route('admin.departments.index')->with('msg', 'Department updated Successfully')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $id;
        Department::destroy($id);
        // Department::find($id)->delete();

        return redirect()->route('admin.departments.index')->with('msg', 'Department Deleted Successfully')->with('type', 'danger');
    }
}
