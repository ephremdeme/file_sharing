@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add File') }}</div>

                <div class="card-body">
 
        <form action="{{ route('files.update', $file->id) }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="yearselect">Year select</label>
                <select name="year" class="form-control" id="yearselect" value>
                    <option value="" disabled selected>Select Year</option>
                    <option value=1>1 Year</option>
                    <option value=2>2 Year</option>
                    <option value=3>3 Year</option>
                    <option value=4>4 Year</option>
                    <option value=5>5 Year</option>
                </select>
            </div>

            <div class="form-group">
                <label for="schoolselect">School select</label>
                <select name="school" class="form-control" id="schoolselect">
                    <option value="" disabled selected>Select school</option>

                </select>
            </div>

            <div class="form-group">
                <label for="deptselect">Department select</label>
                <select name="dept" class="form-control" id="deptselect">
                    <option value="" disabled selected>Select dept</option>
                </select>
            </div>

            <div class="form-group">
            <label for="secInput">Section</label>
            <input type="number" min="1"  max="50" required name="section" class="form-control" id="secInput" aria-describedby="SectioHelp"  placeholder="Enter Section">
        </div>
            <div class="form-group">
                <label for="excelinput">Select File</label>
                <input type="file"  name="file" class="form-control-file" id="excelinput">
            </div>

            <div class="form-group">
            <label for="exampleInputPassword1">File Name</label>
            <input type="text" value ="{{ $file->name }}" name="file_name" class="form-control" id="exampleInputPassword1" placeholder="File Name">
        </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>
</div>
<div>
@endsection