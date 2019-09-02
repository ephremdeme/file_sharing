@extends('layouts.master')
@section('specificCSS')
<link rel="stylesheet" href="{{'css/datatables.min.css'}} ">
@append

@section('specificJS')
<script src="{{ asset('js/datatables.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });

    function fill_form() {
        $('.edit').on('click', function () {
            $('#nameselect').val($(this).data('name'))
            $('#descselect').val($(this).data('desc'))
            $('#courseselect').val($(this).data('course_code'))

        })
    }

    function get_action() {
        $('.remove').on('click', function () {
            console.log($(this).data('id'));
            $("#deletf").attr('action', "/files/" + $(this).data('id'));
            console.log($('#deletf').attr('action'))
        })
    }
    get_action()
    fill_form()

</script>
@append
@section('content')
<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">File management Table With Full Features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <span class="table-add float-right mb-3 mr-2"><a href="#!" data-toggle="modal" data-target="#addFile"
                        class="text-success"><i class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
                <div class="table-responsive-sm">
                    <table id="dtBasicExample" class="table table-striped  table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Name</th>
                                <th class="th-sm">Type</th>
                                <th class="th-sm">Size</th>
                                <th class="th-sm">Course Code</th>
                                <th class="th-sm">Description</th>
                                <th class="th-sm">Creadted at</th>
                                <th class="th-sm">Author</th>
                                <th class="th-sm">Edit</th>
                                <th class="th-sm">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($files as $file)
                            <tr>
                                <td>{{$file->name}}</td>
                                <td>{{$file->type}}</td>
                                <td>{{$file->size /1024}}</td>
                                <td>{{$file->course->course_code}}</td>
                                <td>{{$file->description}}</td>
                                <td>{{$file->created_at}}</td>
                                <td>{{$user->userable->name}}</td>
                                <td>
                                    <span class="table-remove"><button data-toggle="modal" data-target="#addFile"
                                            type="button" data-name="{{$file->name}}" data-desc="{{$file->description}}"
                                            data-type="{{$file->type}}" data-size="{{$file->size}}"
                                            data-course_code="{{$file->course->course_code}}"
                                            class="btn btn-success btn-rounded btn-sm my-0 edit">Edit </button></span>
                                </td>
                                <td>

                                    <span class="table-remove"><button type="button" data-id="{{$file->id}}"
                                            data-toggle="modal" data-target="#deleteFile"
                                            class="btn btn-danger btn-rounded btn-sm my-0 remove">Remove</button></span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="th-sm">Name</th>
                                <th class="th-sm">Type</th>
                                <th class="th-sm">Size</th>
                                <th class="th-sm">Course Code</th>
                                <th class="th-sm">Description</th>
                                <th class="th-sm">Creadted at</th>
                                <th class="th-sm">Author</th>
                                <th class="th-sm">Edit</th>
                                <th class="th-sm">Remove</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info" role="alert">
                    Are You Sure You want to delete?
                </div>
            </div>
            <div class="modal-footer">
                <form id="deletf" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="yearselect">Year </label>
                        <select name="year" class="form-control" id="yearselect">
                            <option value="" disabled selected>Select Year</option>
                            <option value=1>1 Year</option>
                            <option value=2>2 Year</option>
                            <option value=3>3 Year</option>
                            <option value=4>4 Year</option>
                            <option value=5>5 Year</option>
                        </select>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="courseselect">Course </label>
                            <select name="course_code" class="form-control" id="courseselect">
                                <option value="" disabled selected>Select Course</option>
                                @foreach ($user->courses as $course)
                                <option value={{$course->id}}>{{$course->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="deptselect">Department</label>
                            <select name="dept" class="form-control" id="deptselect">
                                <option value="" disabled selected>Select dept</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="secselect">Section</label>
                            <input type="number" min="1" max="50" required name="section" class="form-control"
                                id="secselect" aria-describedby="SectioHelp" placeholder="Enter Section">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nameselect">File Name</label>
                        <input type="text" name="file_name" class="form-control" id="nameselect"
                            placeholder="File Name">
                    </div>
                    <div class="form-group">
                        <label for="descselect">Discription</label>
                        <textarea class="form-control" name="description" id="descselect" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="fileselect">Select File</label>
                        <input type="file" name="file" class="form-control-file" id="fileselect">
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



@endsection
