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

    function get_action() {
        $('.forward').on('click', function () {
            console.log($(this).data('id'));
            $("#forward_form").attr('action', "/files/" + $(this).data('id') +"/forward");
            
        })
    }
    get_action()

</script>
@append
@section('content')
<div class="row">
    <div class="col-12">

        <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table id="dtBasicExample" class="table table-striped  table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Name</th>
                                <th class="th-sm">Type</th>
                                <th class="th-sm">Size</th>
                                <th class="th-sm">Course Code</th>
                                <th class="th-sm">Description</th>
                                <th class="th-sm">Forward</th>
                                <th class="th-sm">Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($files as $file)
                            <tr>
                                <td>{{$file->name}}</td>
                                <td>{{$file->type}}</td>
                                <td>{{$file->size /1024}}</td>
                                <td>{{$file->course_code}}</td>
                                <td>{{$file->description}}</td>
                                <td>

                                        <span class="table-remove"><button type="button" data-id="{{$file->id}}"
                                                data-toggle="modal" data-target="#forward"
                                                class="btn btn-outline-success btn-rounded btn-sm m-0 waves-effect waves-light my-0 forward">
                                                <i class="fa fa-share-square"></i></button></span>
                                </td>
                                <td>
                                    <a href="files/{{$file->id}}" class="btn btn-outline-teal btn-rounded btn-sm m-0 waves-effect waves-light">Download</a>
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
                                <th class="th-sm">Forward</th>
                                <th class="th-sm">Download</th>
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

<div class="modal fade" id="forward" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
            <form id="forward_form" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label for="idselect">Student id</label>
                        <input class="form-control" name="id" id="idselect" placeholder="student id">
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



@endsection
