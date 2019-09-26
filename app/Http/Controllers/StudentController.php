<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Student;
use App\Imports\StudentsImport;
use App\Imports\TakesImport;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.index', ['students'=>Student::all(), 'user'=>Auth::user()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('import', ['name'=>'Students', 'route'=>'students.store']);
    }

    public function importTakesView()
    {
        return view('import', ['name'=>'Takes', 'route'=>'students.store']);
    }

    public function importTakes(Request $request){
        $this->validate($request, [
            'files'  => 'required|mimes:xls,xlsx'
           ]);
        Excel::import(new TakesImport, $request->file('files'));
        
        return back()->with('success', "successfully uploaded Student's takes excel file!");
    }

    public function importStudents(Request $request){
        $this->validate($request, [
            'files'  => 'required|mimes:xls,xlsx'
           ]);
        Excel::import(new StudentsImport, $request->file('files'));
        return back()->with('success', "successfully uploaded Students list excel file!");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'files'  => 'required|mimes:xls,xlsx'
           ]);
        Excel::import(new StudentsImport, $request->file('files'));
        return back()->with('success', "successfully uploaded Students list excel file!");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('student.view', ['student' => Student::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return $student;
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
        $student = Student::find($id);
        

        $id = $request->input('id');
        $name = $request->input('name');
        $gender = $request->input('gender');

        $student->stud_id=$id;
        $student->name=$name;
        $student->gender=$gender;
        $student->save();

        return $student;

        return back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::destroy($id);
        return back();


    }
}
