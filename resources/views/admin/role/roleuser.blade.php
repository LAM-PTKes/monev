@extends('admin.layouts.app')
@section('title')
    Role User
@endsection
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Administrator</a></li>
                                <li class="breadcrumb-item active">Role User</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Role User</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">

                        <div class="form-group text-left mb-5">
                            <button class="btn btn-outline-danger width-md waves-effect waves-light" data-toggle="tooltip"
                                data-placement="right" title="Tambah Data" data-original-title="Tooltip on right"
                                id='BtnAdd'>
                                <i class="fas fa-plus mr-1"></i>
                                <span>Role User</span>
                            </button>
                            @include('alerts.alerts')
                        </div>

                        <table class="table table-striped table-bordered dt-responsive nowrap zzz"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Action</th>
                                    <th>User</th>
                                    <th>Role User</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($rusr as $k)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td align='center'>
                                            <form action="{{ route('DRoleUser', $k->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="button"
                                                    class="btn btn-icon waves-effect waves-light btn-outline-warning edit"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"
                                                    data-original-title="Tooltip on top"
                                                    value="{{ $k->id }}~{{ $k->user_id }}~{{ $k->role_id }}">
                                                    <i class="fas fa-edit" style="color:black;"></i>
                                                </button>

                                                <button type="button"
                                                    class="btn btn-icon waves-effect waves-light btn-outline-danger dlt"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"
                                                    data-original-title="Tooltip on top">
                                                    <i class=" fas fa-trash-alt" style="color:black;"></i>
                                                </button>

                                            </form>
                                        </td>
                                        <td>{{ $k->user->name }}</td>
                                        <td>{{ str_replace('Ngadimin', 'Admin', $k->role->role_name) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
        <!-- end container-fluid -->

    </div>
    <!-- end content -->

    <div id="ModalAdd" class="modal fade" tabindex="-1" Role User="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%; max-width: none;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Add Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form class="form-horizontal" method="POST" action="{{ route('SRoleUser') }}">
                    @csrf

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-12 mt-4">

                                <div class="form-group row">
                                    <label for="user_id" class="col-sm-3 control-label">User Name</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2 w-100" id="user_id" name="user_id" required
                                            data-parsley-errors-container="#error-user_id">
                                            <option value="">Select</option>
                                            @foreach ($user as $k)
                                                <option value="{{ $k->id }}">{{ $k->name }}</option>
                                            @endforeach
                                        </select>
                                        <div id="error-user_id"></div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="role_id" class="col-sm-3 control-label">Role</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2 w-100" id="role_id" name="role_id" required
                                            data-parsley-errors-container="#error-role_id">
                                            <option value="">Select</option>
                                            @foreach ($role as $k)
                                                <option value="{{ $k->id }}">{{ $k->role_name }}</option>
                                            @endforeach
                                        </select>
                                        <div id="error-role_id"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger width-md waves-effect waves-light"
                            data-dismiss="modal">
                            <i class="fas fa-times mr-1"></i>
                            <span>Close</span>
                        </button>
                        <button type="submit" class="btn btn-outline-success width-md waves-effect waves-light">
                            <i class="fas fa-save mr-1"></i>
                            <span>Save changes</span>
                        </button>
                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <div id="ModalEdit" class="modal fade" tabindex="-1" Role User="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%; max-width: none;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form class="form-horizontal" method="GET" action="{{ route('ERoleUser') }}">
                    @csrf



                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-12 mt-4">

                                <div class="form-group row" id='divedit'>
                                    <input type="text" class="form-control" id="id" name="id"
                                        required="">
                                </div>

                                <div class="form-group row">
                                    <label for="euser_id" class="col-sm-3 control-label">User Name</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2 w-100" id="euser_id" name="euser_id"
                                            required data-parsley-errors-container="#error-euser_id">
                                            <option value="">Select</option>
                                            @foreach ($user as $k)
                                                <option value="{{ $k->id }}">{{ $k->name }}</option>
                                            @endforeach
                                        </select>
                                        <div id="error-euser_id"></div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="erole_id" class="col-sm-3 control-label">Role</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2 w-100" id="erole_id" name="erole_id"
                                            required data-parsley-errors-container="#error-erole_id">
                                            <option value="">Select</option>
                                            @foreach ($role as $k)
                                                <option value="{{ $k->id }}">{{ $k->role_name }}</option>
                                            @endforeach
                                        </select>
                                        <div id="error-erole_id"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger width-md waves-effect waves-light"
                            data-dismiss="modal">
                            <i class="fas fa-times mr-1"></i>
                            <span>Close</span>
                        </button>
                        <button type="submit" class="btn btn-outline-success width-md waves-effect waves-light">
                            <i class="fas fa-save mr-1"></i>
                            <span>Save changes</span>
                        </button>
                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
@include('admin.jsfile.datatable')
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#BtnAdd').on('click', function() {
                // Aksi ketika tombol diklik
                $('#ModalAdd').modal('show');
                //alert('Tombol Role User diklik!');
            });

            $(document).on('click', '.edit', function() {
                let data = $(this).val().split('~');

                $('#ModalEdit').modal('show');
                $('#id').val(data[0]);
                $('#euser_id').val(data[1]).trigger('change');
                $('#erole_id').val(data[2]).trigger('change');
                $('#divedit').hide();
            });

            $(document).on('click', '.dlt', function(event) {
                event.preventDefault();

                var form = $(this).closest("form");

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    type: "warning", // ← pakai 'type' kalau versi lama
                    showCancelButton: true,
                    confirmButtonColor: "#348cd4",
                    cancelButtonColor: "#6c757d",
                    confirmButtonText: "Yes, delete it!"
                }).then(function(result) {
                    if (result.value) { // versi lama pakai .value, bukan .isConfirmed
                        //console.log("Form submitted to:", form.attr('action'));
                        form.submit();
                    }
                });
            });

            $('.select2').select2({
                placeholder: "Select",
                allowClear: true,
                width: '100%' // biar select-nya tetap full lebar
            });

        });
    </script>
@endpush
