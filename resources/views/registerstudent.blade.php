@extends('layouts.app')

@section('content')
<form action="{{ route('students.store') }}" method="POST">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Student ID</label>
    <input type="String" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id"  placeholder="enter your id">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="String" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="Enter name">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Gender</label>
    <input type="String" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="gender"placeholder="Enter gender">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Department</label>
    <input type="String" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="department"placeholder="Enter department">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Section</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="section"placeholder="Enter section">
  </div>

  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection