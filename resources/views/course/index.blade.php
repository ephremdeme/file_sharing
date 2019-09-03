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
            $('#course_codeselect').val($(this).data('code'))
            $('#nameselect').val($(this).data('name'))
            $('#dept_nameselect').val($(this).data('dept'))

            $("#editForm").attr('action', "/courses/" + $(this).data('id'));

        })
    }

    function get_action() {
        $('.remove').on('click', function () {
            console.log($(this).data('id'));
            $("#deletf").attr('action', "/courses/" + $(this).data('id'));
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
                <h3 class="card-title">Course management Table With Full Features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <span class="table-add float-right mb-3 mr-2"><a href="#!" data-toggle="modal" data-target="#addcourse"
                        class="text-success"><i class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
                <div class="table-responsive-sm">
                    <table id="dtBasicExample" class="table table-striped  table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">course code</th>
                                <th class="th-sm">name</th>
                                <th class="th-sm">dept_name</th>
                                <th class="th-sm">Creadted at</th>
                                <th class="th-sm">Edit</th>
                                <th class="th-sm">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                            <tr>
                                <td>{{$course->course_code}}</td>
                                <td>{{$course->name}}</td>
                                <td>{{$course->dept_name}}</td>
                                <td>{{$course->created_at}}</td>
                                <td>
                                    <span class="table-remove"><button data-toggle="modal" data-target="#editcourse"
                                            type="button" data-id="{{ $course->id }}" data-code="{{$course->course_code}}"
                                            data-name="{{$course->name}}" data-dept="{{$course->dept_name}}"
                                            class="btn btn-success btn-rounded btn-sm my-0 edit">Edit </button></span>
                                </td>
                                <td>

                                    <span class="table-remove"><button type="button" data-id="{{$course->id}}"
                                            data-toggle="modal" data-target="#deleteCourse"
                                            class="btn btn-danger btn-rounded btn-sm my-0 remove">Remove</button></span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                            <th class="th-sm">course code</th>
                                <th class="th-sm">name</th>
                                <th class="th-sm">dept_name</th>
                                <th class="th-sm">Creadted at</th>
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
<div class="modal fade" id="deleteCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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

<div class="modal fade" id="addcourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('course.form')
                </form>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="editcourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                        <div class="form-group ">
                            <label for="courseselect">Department </label>
                            <select name="dept" class="form-control" id="deptselect">
                                <option value="" disabled selected>Select Department</option>
                                @foreach ($departments as $dept)
                                <option value={{$dept->id}}>{{$dept->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="course_codeselect">Course_code</label>
                            <input type="text" name="course_code" class="form-control" id="course_codeselect"
                                placeholder="Course code">
                        </div>
                        <div class="form-group">
                            <label for="nameselect">Name</label>
                            <input class="form-control" name="name" id="nameselect" placeholder="course name">
                        </div>
                        
        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

</div>
                </form>
            </div>

        </div>
    </div>
</div>


@endsection
