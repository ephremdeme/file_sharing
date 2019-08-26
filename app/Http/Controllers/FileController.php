<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class FileController extends Controller
{
    /**
     * Display a listing of the resource->
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return File::all();
    }

    /**
     * Show the form for creating a new resource->
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('file.addFile');
    }

    /**
     * Store a newly created resource in storage->
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
            $file->save();
            return "successfull";
        }
        return $year.$file_name;

    }

    /**
     * Display the specified resource->
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return File::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource->
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('file.editFile', ['file' => File::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage->
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $file = File::findOrFail($id);
        $year = $request->input('year');
        $sec = $request->input('section');
        $school = $request->input('school');
        $file_name = $request->input('file_name');
        
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
     * Remove the specified resource from storage->
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = File::destroy($id);
        if($check==0){
            return "Failed to delete";
        }
        return "successfull";
    }
}
