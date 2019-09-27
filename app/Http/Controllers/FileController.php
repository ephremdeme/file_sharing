<?php

namespace App\Http\Controllers;

use App\File;
use App\Course;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\ViewFileInstructor;
class FileController extends Controller
{

    // public function __construct()
    // {
    //     $this->authorizeResource(File::class, 'file');
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         if (Auth::user()->hasRole('INSTRUCTOR')){
            return view('file.index', ['files' =>  ViewFileInstructor::where('user_id', Auth::id())->get(), 'user' => Auth::user(), 'teaches'=>Auth::user()->userable->teaches]);
        }
        
        return view('file.index', ['files' =>  ViewFileInstructor::where('user_id', Auth::id())->get(), 'user' => Auth::user(), 'teaches'=>Auth::user()->userable->teaches]);
    }

    public function sharedFile(){
        return view('student.file_view', ['files' =>  Auth::user()->files, 'user' => Auth::user()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('file.addFile');
    }

    public function forward(Request $request, $id){
        $file = File::find($id);
        $student = Student::where('student_id', $request->input('id'))->first();
        
        $student->user->files()->save($file);
        return back()->with('success', 'Successfully forwarded to'.$request->input('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = new File();
        $sec = $request->input('section');
        $course_code = $request->input('course_code');
        $file_name = $request->input('file_name');
        
        
            $name = $request->file('file')->store('files');
            $file->name = $file_name;
            $file->path = $name;
            $file->type = $request->file('file')->getClientOriginalExtension();
            $file->size = $request->file('file')->getSize();
            $file->description = $request->input('description');
            $file->save();
            
            DB::table('file_section')->insert(
                ['file_id'=>$file->id, 'year'=>date("Y"), 'sec_id'=>$sec, 'course_code'=>$course_code, 'semester'=>2]
            );
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = File::find($id);
        // return $file;
        return response()->file(base_path('storage/app/'.$file->path));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        return view('file.editfile', ['file'=>$file]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        $year = $request->input('year');
        $sec = $request->input('section');
        $school = $request->input('school');
        $file_name = $request->input('file_name');
        $file->description = $request->input('description');
        
        if($request->file('file')){
            if ($request->file('file')->isValid()) {
                $name = $request->file('file')->store('files');
                $file->name = $file_name;
                $file->path = $request->file('file')->store('files');
                $file->type = $request->file('file')->getClientOriginalExtension();
                $file->size = $request->file('file')->getSize();
                $file->description = $request->input('description');
                $file->save();

                return back();
            }
        }
        
        $file->name = $file_name;
        $file->save();
        return $year.$file_name;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $check = File::destroy($file->id);
        if($check==0){
            return "Failed to delete";
        }
        return back() ;
    }
}
