@extends('admin.layouts.app')
@section('title')
    Unit Kerja
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
                                <li class="breadcrumb-item active">Unit Kerja</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Unit Kerja</h4>
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
                                <span>Unit Kerja</span>
                            </button>
                            @include('alerts.alerts')
                        </div>

                        <table class="table table-striped table-bordered dt-responsive nowrap zzz"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Action</th>
                                    <th>Nama Unit</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($unit as $k)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td align='center'>
                                            <form action="{{ route('dunitkerja', $k->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="button"
                                                    class="btn btn-icon waves-effect waves-light btn-outline-warning edit"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"
                                                    data-original-title="Tooltip on top"
                                                    value="{{ $k->id }}~{{ $k->nama_unit }}">
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
                                        <td>{{ $k->nama_unit }}</td>
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

    <div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%; max-width: none;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Add Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form class="form-horizontal" method="POST" action="{{ route('sunitkerja') }}">
                    @csrf

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 mt-4">

                                <div class="form-group row">
                                    <label for="nama_unit" class="col-sm-3 control-label">Nama Unit</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama_unit" name="nama_unit"
                                            placeholder="Nama Unit" required="">
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


    <div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%; max-width: none;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form class="form-horizontal" method="GET" action="{{ route('eunitkerja') }}">
                    @csrf

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 mt-4">

                                <div class="form-group row" id='divedit'>
                                    <input type="text" class="form-control" id="id" name="id"
                                        required="">
                                </div>

                                <div class="form-group row">
                                    <label for="enama_unit" class="col-sm-3 control-label">Nama Unit</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="enama_unit" name="enama_unit"
                                            placeholder="Nama Unit" required="">
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
                //alert('Tombol Unit Kerja diklik!');
            });

            $(document).on('click', '.edit', function() {
                let data = $(this).val().split('~');

                $('#ModalEdit').modal('show');
                $('#id').val(data[0]);
                $('#enama_unit').val(data[1]);
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



        });
    </script>
@endpush
