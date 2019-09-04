<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(File::class, 'file');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('file.index', ['files' =>  Auth::user()->files, 'user' => Auth::user()]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = new File();
        
        $year = $request->input('year');
        $sec = $request->input('section');
        $school = $request->input('school');
        $file_name = $request->input('file_name');
        echo $year.$sec;
        if ($request->file('file')->isValid()) {
            $name = $request->file('file')->store('files');
            $file->name = $file_name;
            $file->path = $name;
            $file->type = $request->file('file')->getClientOriginalExtension();
            $file->size = $request->file('file')->getSize();
            $file->save();
            Auth::user()->userable->files()->save($file);
            return "successfull";
        }
        return $year.$file_name;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        return $file;
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
                $file->path = $name;
                $file->save();
                return "successfull";
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
        return "successfull";    }
}
