<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta
        content="LAM-PTKes, IAAHEH,Lembaga Akreditasi Mandiri Pendidikan Tinggi Kesehatan Indonesia,Lembaga Akreditasi,Pendidikan Tinggi Kesehatan Indonesia"name="description" />
    <meta content="LAM-PTKes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('web/logo-lam-214.png') }}">

    <!-- Table datatable css -->
    <link href="{{ asset('admin/assets/libs/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/assets/libs/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/assets/libs/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/assets/libs/datatables/fixedHeader.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/assets/libs/datatables/scroller.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/assets/libs/datatables/dataTables.colVis.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/libs/datatables/fixedColumns.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/assets/libs/custombox/custombox.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Notification css (Toastr) -->
    <link href="{{ asset('admin/assets/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('admin/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('admin/assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/libs/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/libs/multiselect/multi-select.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/libs/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Plugins css -->
    <link href="{{ asset('admin/assets/libs/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('admin/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/assets/libs/clockpicker/bootstrap-clockpicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/assets/libs/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- App css -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"
        id="bootstrap-stylesheet" />
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
        integrity="sha512-bnIvzh6FU75ZKxp0GXLH9bewza/OIw6dLVh9ICg0gogclmYGguQJWl8U30WpbsGTqbIiAwxTsbe76DErLq5EDQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body class="enlarged" data-keep-enlarged="true">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('web/personal.png') }}" alt="user-image" class="rounded-circle">
                        <span class="d-none d-sm-inline-block ml-1">{{ auth()->user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-outline"></i>
                            <span>Profile</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"class="dropdown-item notify-item">
                            <i class="mdi mdi-logout-variant"></i>
                            <span>Logout</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>

                {{-- <li class="dropdown notification-list">
                    <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect">
                        <i class="mdi mdi-settings noti-icon"></i>
                    </a>
                </li> --}}

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="{{ route('dashboard') }}" class="logo text-center">
                    <span class="logo-lg">
                        <img src="{{ asset('web/logo-lam-214.png') }}" alt="" height="60">
                        <!-- <span class="logo-lg-text-light">Zircos</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-sm-text-dark">Z</span> -->
                        <img src="{{ asset('web/logo-lam-214.png') }}" alt="" height="60">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>

            </ul>
        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <div class="slimscroll-menu">

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul class="metismenu" id="side-menu">

                        <li class="menu-title">Navigation</li>

                        <li>
                            <a href="{{ route('dashboard') }}" class="waves-effect waves-light">
                                <i class="fas fa-home"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('dashboard') }}" class="waves-effect waves-light">
                                <i class="fas fa-user-alt"></i>
                                <span> Profile </span>
                            </a>
                        </li>

                        <li class="menu-title mt-2">Dokumen</li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect waves-light">
                                <i class="fas fa-clipboard-list"></i>
                                <span>Daftar Monev</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('MonevAkre') }}">Unit Akreditasi</a></li>
                                <li><a href="{{ route('MonevIT') }}">Unit IT</a></li>
                                <li><a href="{{ route('MonevKepeg') }}">Unit Kepegawaian</a></li>
                                <li><a href="{{ route('MonevKeu') }}">Unit Keuangan</a></li>
                                <li><a href="{{ route('MonevPPS') }}">Unit PPS</a></li>
                                <li><a href="{{ route('MonevRnD') }}">Unit RnD</a></li>
                                <li><a href="{{ route('MonevSarana') }}">Unit Sarana</a></li>
                                <li><a href="{{ route('MonevSekre') }}">Unit Sekretariat</a></li>
                                <li><a href="{{ route('MonevSPMI') }}">Unit SPMI</a></li>
                            </ul>
                        </li>

                        @if (Auth::user()->roles->pluck('role_name')->contains('Ngadimin') ||
                                Auth::user()->roles->pluck('role_name')->contains('Admin'))
                            <li class="menu-title mt-2">Administrator</li>

                            <li>
                                <a href="{{ route('unitkerja') }}" class="waves-effect waves-light">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                    <span>Unit Kerja</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="waves-effect waves-light">
                                    <i class="fas fa-users"></i>
                                    <span>Hak Akses</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('user') }}">User</a></li>
                                    <li><a href="{{ route('role') }}">Role</a></li>
                                    <li><a href="{{ route('RoleUser') }}">Role User</a></li>
                                </ul>
                            </li>
                        @endif

                    </ul>

                </div>
                <!-- End Sidebar -->

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">

            @yield('content')

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            {{ date('Y') }} &copy; LAM-PTKes <a href="#">IT LAM-PTKes</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div class="rightbar-title">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="mdi mdi-close"></i>
            </a>
            <h4 class="font-16 m-0 text-white">Theme Customizer</h4>
        </div>
        <div class="slimscroll-menu">

            <div class="p-4">
                <div class="mb-2">
                    <img src="{{ asset('admin/assets/images/layouts/light.png') }}" class="img-fluid img-thumbnail"
                        style="max-width:50%;" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch"
                        checked />
                    <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('admin/assets/images/layouts/dark.png') }}" class="img-fluid img-thumbnail"
                        style="max-width:50%;" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch"
                        data-bsStyle="{{ asset('admin/assets/css/bootstrap-dark.min.css') }}"
                        data-appStyle="{{ asset('admin/assets/css/app-dark.min.css') }}" />
                    <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('admin/assets/images/layouts/rtl.png') }}" class="img-fluid img-thumbnail"
                        style="max-width:50%;" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch"
                        data-appStyle="{{ asset('admin/assets/css/app-rtl.min.css') }}" />
                    <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('admin/assets/images/layouts/dark-rtl.png') }}"
                        class="img-fluid img-thumbnail" style="max-width:50%;" alt="">
                </div>
                <div class="custom-control custom-switch mb-5">
                    <input type="checkbox" class="custom-control-input theme-choice" id="dark-rtl-mode-switch"
                        data-bsStyle="{{ asset('admin/assets/css/bootstrap-dark.min.css') }}"
                        data-appStyle="{{ asset('admin/assets/css/app-dark-rtl.min.css') }}" />
                    <label class="custom-control-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                </div>

            </div>
        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <a href="javascript:void(0);" class="right-bar-toggle demos-show-btn">
        <i class="mdi mdi-settings-outline mdi-spin"></i> &nbsp;Choose Demos
    </a>

    <!-- Vendor js -->
    <script src="{{ asset('admin/assets/js/vendor.min.js') }}"></script>

    <script src="{{ asset('admin/assets/libs/morris-js/morris.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/pages/icon.init.js') }}"></script>

    <!-- Datatable plugin js -->
    <script src="{{ asset('admin/assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('admin/assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('admin/assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('admin/assets/libs/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/datatables/buttons.print.min.js') }}"></script>

    <script src="{{ asset('admin/assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/datatables/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/datatables/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/datatables/dataTables.fixedColumns.min.js') }}"></script>

    <script src="{{ asset('admin/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/pdfmake/vfs_fonts.js') }}"></script>

    <!-- Plugin js-->
    <script src="{{ asset('admin/assets/libs/parsleyjs/parsley.min.js') }}"></script>

    <script src="{{ asset('admin/assets/libs/custombox/custombox.min.js') }}"></script>

    <!-- Toastr js -->
    <script src="{{ asset('admin/assets/libs/toastr/toastr.min.js') }}"></script>

    <script src="{{ asset('admin/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script src="{{ asset('admin/assets/libs/switchery/switchery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/multiselect/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/jquery-quicksearch/jquery.quicksearch.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/jquery-mockjax/jquery.mockjax.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/autocomplete/jquery.autocomplete.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap-filestyle2/bootstrap-filestyle.min.js') }}"></script>

    <!-- Plugins js -->
    <script src="{{ asset('admin/assets/libs/dropify/dropify.min.js') }}"></script>

    <script src="{{ asset('admin/assets/libs/moment/moment.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/clockpicker/bootstrap-clockpicker.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!--Form Wizard-->
    <script src="{{ asset('admin/assets/libs/jquery-steps/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/jquery-validation/jquery.validate.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('admin/assets/js/app.min.js') }}"></script>
    @stack('scripts')
</body>

</html>
