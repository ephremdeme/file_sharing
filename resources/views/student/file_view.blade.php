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
                                <th class="th-sm">Creadted at</th>
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
                                <td>{{$file->created_at}}</td>
                                <td>
                                    <span class="table-remove"><a href="files/{{$file->id}}">Download</a></span>
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




@endsection
