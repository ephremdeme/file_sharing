<?php

namespace App\Http\Controllers;

use App\ViewFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ViewFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.file_view', ['files' =>  ViewFile::where('stud_id', Auth::id())->get(), 'user' => Auth::user()]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ViewFile  $viewFile
     * @return \Illuminate\Http\Response
     */
    public function show(ViewFile $viewFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ViewFile  $viewFile
     * @return \Illuminate\Http\Response
     */
    public function edit(ViewFile $viewFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ViewFile  $viewFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ViewFile $viewFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ViewFile  $viewFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(ViewFile $viewFile)
    {
        //
    }
}
