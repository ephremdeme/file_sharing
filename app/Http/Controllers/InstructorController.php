<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Instructor;
use Illuminate\Http\Request;
use Excel;
use App\Imports\InstructorsImport;
use App\Import\TeachesImport;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('instructor.index', ['instructors'=>Instructor::all(), 'user'=>Auth::user()]);

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

    public function importInstructors(request $request)
    {
        $this->validate($request, [
            'files'  => 'required|mimes:xls,xlsx'
           ]);
        Excel::import(new InstructorsImport, $request->file('files'));

        return back()->with('success', "successfully uploaded Instructors excel file!");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    public function importTeachesView()
    {
        return view('instructor.importTeaches');
    }

    public function importTeaches(Request $request){
        $this->validate($request, [
            'files'  => 'required|mimes:xls,xlsx'
           ]);
        Excel::import(new TeachesImport, $request->file('files'));
        return back()->with('success', "successfully uploaded Instructor's teaches excel file!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function edit(Instructor $instructor)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instructor $instructor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor $instructor)
    {
        //
    }
}
