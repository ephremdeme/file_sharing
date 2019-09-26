@extends('layouts.master')

@section('specificCSS')
<link rel="stylesheet" href="{{ asset('css/mdb.min.css') }} ">
@append

@section('specificJS')
<script src="{{ asset('js/mdb.min.js') }}"></script>
@append

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 mb-4">
            <div class="card card-cascade narrower">

                <!-- Card image -->
              <div class="view view-cascade gradient-card-header mdb-color lighten-3">
                <h5 class="mb-0 font-weight-bold">Select List Of {{ $name }} Excel File</h5>
              </div>
              <!-- Card image -->

                <div class="card-body card-body-cascade ">
                    <form action="{{ route($route) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="fileselect">Select File</label>
                            <input type="file" name="files" class="form-control-file" id="fileselect">
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center my-4">
                              <input type="submit" value="Import {{$name}}" class="btn btn-info btn-rounded">
                            </div>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
