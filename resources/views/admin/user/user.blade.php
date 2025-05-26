@extends('admin.layouts.app')
@section('title')
    User
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Hak Akses</a></li>
                                <li class="breadcrumb-item active">User</li>
                            </ol>
                        </div>
                        <h4 class="page-title">User</h4>
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
                                <span>User</span>
                            </button>
                            @include('alerts.alerts')
                        </div>

                        <table class="table table-striped table-bordered dt-responsive nowrap zzz"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Action</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($user as $k)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td align='center'>
                                            <form action="{{ route('duser', $k->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="button"
                                                    class="btn btn-icon waves-effect waves-light btn-outline-warning edit"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"
                                                    data-original-title="Tooltip on top"
                                                    value="{{ $k->id }}~{{ $k->name }}~{{ $k->email }}">
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
                                        <td>{{ $k->name }}</td>
                                        <td>{{ $k->email }}</td>
                                        <td align='center'>
                                            @if (empty($k->email_verified_at))
                                                <span class="badge badge-danger">Belum Aktif</span>
                                            @else
                                                <span class="badge badge-success">Aktif</span>
                                            @endif
                                        </td>
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

    <div id="ModalAdd" class="modal fade" tabindex="-1" User="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%; max-width: none;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Add Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form class="form-horizontal" method="POST" action="{{ route('suser') }}">
                    @csrf

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-12 mt-4">


                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Name" required="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Email" required="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 control-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="password" name="password"
                                            minlength="6" placeholder="Password" required="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-3 control-label"></label>
                                    <div class="col-sm-9">
                                        <input type="checkbox" id="ceklogin" data-switch="success" />
                                        <label for="ceklogin" data-on-label="Show" data-off-label="Hide"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Lihat Password"></label>
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


    <div id="ModalEdit" class="modal fade" tabindex="-1" User="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%; max-width: none;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form class="form-horizontal" method="GET" action="{{ route('euser') }}">
                    @csrf

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-12 mt-4">

                                <div class="form-group row" id='divedit'>
                                    <input type="text" class="form-control" id="id" name="id"
                                        required="">
                                </div>

                                <div class="form-group row">
                                    <label for="ename" class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="ename" name="ename"
                                            placeholder="Name" required="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="eemail" class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="eemail" name="eemail"
                                            placeholder="Email" required="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="epassword" class="col-sm-3 control-label">Password</label>
                                    <div class="col-sm-9 ">
                                        <input type="password" class="form-control" id="epassword" minlength="6"
                                            name="epassword" placeholder="Password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-3 control-label"></label>
                                    <div class="col-sm-9 ">
                                        <input type="checkbox" id="eceklogin" data-switch="success" />
                                        <label for="eceklogin" data-on-label="Show" data-off-label="Hide"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Lihat Password"></label>
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
                //alert('Tombol User diklik!');
            });

            $(document).on('click', '.edit', function() {
                let data = $(this).val().split('~');

                $('#ModalEdit').modal('show');
                $('#id').val(data[0]);
                $('#ename').val(data[1]);
                $('#eemail').val(data[2]).attr('readonly', true);
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
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        tooltipTriggerList.forEach(function(el) {
            new bootstrap.Tooltip(el, {
                placement: 'bottom',
                popperConfig: function(defaultBsPopperConfig) {
                    return {
                        ...defaultBsPopperConfig,
                        modifiers: [
                            ...defaultBsPopperConfig.modifiers,
                            {
                                name: 'offset',
                                options: {
                                    offset: [0, 10] // geser tooltip 10px ke bawah
                                }
                            }
                        ]
                    };
                }
            });
        });
        document.getElementById('eceklogin').addEventListener('change', function() {
            const passwordInput = document.getElementById('epassword'); // Ganti dengan ID input password kamu
            passwordInput.type = this.checked ? 'text' : 'password';
        });
    </script>
@endpush
