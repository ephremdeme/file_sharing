<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Support\Facades\Auth;
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
        return view('department.index' , ['departments'=> Department::all(), 'user'=>Auth::user()]);
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
        $name = $request->input('name');
        $building = $request->input('building');
        $school = $request->input('school');
        
        $dept = new Department();
        $dept->name=$name;
        $dept->building=$building;
        $dept->school=$school;
                
        $dept->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $dept = $department;

        $name = $request->input('name');
        $building = $request->input('building');
        $school = $request->input('school');
        
        $dept->name=$name;
        $dept->building=$building;
        $dept->school=$school;
                
        $dept->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $dept = Department::destroy($id);
        return "deleted";
    }
}
