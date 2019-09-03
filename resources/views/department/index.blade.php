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
            $('#buildingselect').val($(this).data('building'))
            $('#schoolselect').val($(this).data('school'))

            $("#editform").attr('action', "/departments/" + $(this).data('id'));

        })
    }

    function get_action() {
        $('.remove').on('click', function () {
            console.log($(this).data('id'));
            $("#deletf").attr('action', "/departments/" + $(this).data('id'));
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
                <h3 class="card-title">Department management Table With Full Features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <span class="table-add float-right mb-3 mr-2"><a href="#!" data-toggle="modal" data-target="#addstudent"
                        class="text-success"><i class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
                <div class="table-responsive-sm">
                    <table id="dtBasicExample" class="table table-striped  table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">name</th>
                                <th class="th-sm">building</th>
                                <th class="th-sm">school</th>
                                <th class="th-sm">Creadted at</th>
                                <th class="th-sm">Edit</th>
                                <th class="th-sm">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $department)
                            <tr>
                                <td>{{$department->name}}</td>
                                <td>{{$department->building}}</td>
                                <td>{{$department->school}}</td>
                                <td>{{$department->created_at}}</td>
                                <td>
                                    <span class="table-remove"><button data-toggle="modal" data-target="#editdepartment"
                                            type="button" data-name="{{$department->name}}"
                                            data-stud_id="{{$department->building}}" data-gender="{{$department->school}}"
                                            class="btn btn-success btn-rounded btn-sm my-0 edit">Edit </button></span>
                                </td>
                                <td>

                                    <span class="table-remove"><button type="button" data-id="{{$department->id}}"
                                            data-toggle="modal" data-target="#deleteStudent"
                                            class="btn btn-danger btn-rounded btn-sm my-0 remove">Remove</button></span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                            <th class="th-sm">name</th>
                                <th class="th-sm">building</th>
                                <th class="th-sm">school</th>
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
<div class="modal fade" id="deletedepartemnt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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

<div class="modal fade" id="adddepartment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('departments.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('department.form')
                </form>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="editdepartment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('course.form')
                </form>
            </div>

        </div>
    </div>
</div>


@endsection
