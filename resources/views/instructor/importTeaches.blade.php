@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header text-center">
                    <h5>Select {{$name}} Excel File </h5>
                </div>

                <div class="card-body">
                    <form action="{{ route($route) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="fileselect">Select File</label>
                            <input type="file" name="files" class="form-control-file" id="fileselect">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
