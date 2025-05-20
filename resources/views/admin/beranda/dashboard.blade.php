@extends('admin.layouts.app')
@section('title')
    Dashboard
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
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            @include('alerts.alerts')

            <div class="row">
                <div class="col-xl-12 mb-5 text-center">
                    <button class="btn btn-outline-dark width-md waves-effect waves-light" data-toggle="tooltip"
                        data-placement="top" title="Lihat Data" data-original-title="Tooltip on top" id='BtnCari'>
                        <i class="fas fa-eye mr-1" style="color:black;"></i>
                        <span>Lihat Rekap Monev</span>
                    </button>
                </div>
            </div>

            <div class="row">

                <div class="col-xl-4 col-md-6">
                    <div class="card widget-box-one border border-success bg-soft-success">
                        <div class="card-body">
                            <div class="float-right avatar-lg rounded-circle mt-3">
                                <i
                                    class="mdi mdi-account-convert font-30 widget-icon rounded-circle avatar-title text-success"></i>
                            </div>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-uppercase font-weight-bold text-muted" title="Unit Akreditasi">
                                    Unit Akreditasi</p>
                                <h2><span data-plugin="counterup">{{ $jml }}</span> <i
                                        class="mdi mdi-arrow-up text-success font-24"></i></h2>
                                <p class="text-muted m-0"><span class="font-weight-medium">Total Monev:</span>
                                    {{ $ttl }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-4 col-md-6">
                    <div class="card widget-box-one border border-danger bg-soft-danger">
                        <div class="card-body">
                            <div class="float-right avatar-lg rounded-circle mt-3">
                                <i
                                    class="mdi mdi-account-convert font-30 widget-icon rounded-circle avatar-title text-danger"></i>
                            </div>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-uppercase font-weight-bold text-muted" title="Unit IT">
                                    Unit IT</p>
                                <h2><span data-plugin="counterup">{{ $jml1 }}</span> <i
                                        class="mdi mdi-arrow-up text-danger font-24"></i></h2>
                                <p class="text-muted m-0"><span class="font-weight-medium">Total Monev:</span>
                                    {{ $ttl1 }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-4 col-md-6">
                    <div class="card widget-box-one border border-info bg-soft-info">
                        <div class="card-body">
                            <div class="float-right avatar-lg rounded-circle mt-3">
                                <i
                                    class="mdi mdi-account-convert font-30 widget-icon rounded-circle avatar-title text-info"></i>
                            </div>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-uppercase font-weight-bold text-muted" title="Unit Kepegawaian">
                                    Unit Kepegawaian</p>
                                <h2><span data-plugin="counterup">{{ $jml2 }}</span> <i
                                        class="mdi mdi-arrow-up text-info font-24"></i></h2>
                                <p class="text-muted m-0"><span class="font-weight-medium">Total Monev:</span>
                                    {{ $ttl2 }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->

            <div class="row">

                <div class="col-xl-4 col-md-6">
                    <div class="card widget-box-one border border-warning bg-soft-warning">
                        <div class="card-body">
                            <div class="float-right avatar-lg rounded-circle mt-3">
                                <i
                                    class="mdi mdi-account-convert font-30 widget-icon rounded-circle avatar-title text-warning"></i>
                            </div>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-uppercase font-weight-bold text-muted" title="Unit Keuangan">
                                    Unit Keuangan</p>
                                <h2><span data-plugin="counterup">{{ $jml3 }}</span> <i
                                        class="mdi mdi-arrow-up text-warning font-24"></i></h2>
                                <p class="text-muted m-0"><span class="font-weight-medium">Total Monev:</span>
                                    {{ $ttl3 }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-4 col-md-6">
                    <div class="card widget-box-one border border-dark bg-soft-dark">
                        <div class="card-body">
                            <div class="float-right avatar-lg rounded-circle mt-3">
                                <i
                                    class="mdi mdi-account-convert font-30 widget-icon rounded-circle avatar-title text-dark"></i>
                            </div>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-uppercase font-weight-bold text-muted" title="Unit PPS">
                                    Unit PPS</p>
                                <h2><span data-plugin="counterup">{{ $jml4 }}</span> <i
                                        class="mdi mdi-arrow-up text-dark font-24"></i></h2>
                                <p class="text-muted m-0"><span class="font-weight-medium">Total Monev:</span>
                                    {{ $ttl4 }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-4 col-md-6">
                    <div class="card widget-box-one border border-purple bg-soft-purple">
                        <div class="card-body">
                            <div class="float-right avatar-lg rounded-circle mt-3">
                                <i
                                    class="mdi mdi-account-convert font-30 widget-icon rounded-circle avatar-title text-purple"></i>
                            </div>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-uppercase font-weight-bold text-muted" title="Unit RnD">
                                    Unit RnD</p>
                                <h2><span data-plugin="counterup">{{ $jml5 }}</span> <i
                                        class="mdi mdi-arrow-up text-purple font-24"></i></h2>
                                <p class="text-muted m-0"><span class="font-weight-medium">Total Monev:</span>
                                    {{ $ttl5 }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->

            <div class="row">

                <div class="col-xl-4 col-md-6">
                    <div class="card widget-box-one border border-teal bg-soft-teal">
                        <div class="card-body">
                            <div class="float-right avatar-lg rounded-circle mt-3">
                                <i
                                    class="mdi mdi-account-convert font-30 widget-icon rounded-circle avatar-title text-teal"></i>
                            </div>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-uppercase font-weight-bold text-muted" title="Unit Sarana">
                                    Unit Sarana</p>
                                <h2><span data-plugin="counterup">{{ $jml6 }}</span> <i
                                        class="mdi mdi-arrow-up text-teal font-24"></i></h2>
                                <p class="text-muted m-0"><span class="font-weight-medium">Total Monev:</span>
                                    {{ $ttl6 }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-4 col-md-6">
                    <div class="card widget-box-one border border-orange bg-soft-orange">
                        <div class="card-body">
                            <div class="float-right avatar-lg rounded-circle mt-3">
                                <i
                                    class="mdi mdi-account-convert font-30 widget-icon rounded-circle avatar-title text-orange"></i>
                            </div>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-uppercase font-weight-bold text-muted" title="Unit Sekretariat">
                                    Unit Sekretariat</p>
                                <h2><span data-plugin="counterup">{{ $jml7 }}</span> <i
                                        class="mdi mdi-arrow-up text-orange font-24"></i></h2>
                                <p class="text-muted m-0"><span class="font-weight-medium">Total Monev:</span>
                                    {{ $ttl7 }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-4 col-md-6">
                    <div class="card widget-box-one border border-brown bg-soft-brown">
                        <div class="card-body">
                            <div class="float-right avatar-lg rounded-circle mt-3">
                                <i
                                    class="mdi mdi-account-convert font-30 widget-icon rounded-circle avatar-title text-brown"></i>
                            </div>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-uppercase font-weight-bold text-muted" title="Unit SPMI">
                                    Unit SPMI</p>
                                <h2><span data-plugin="counterup">{{ $jml8 }}</span> <i
                                        class="mdi mdi-arrow-up text-brown font-24"></i></h2>
                                <p class="text-muted m-0"><span class="font-weight-medium">Total Monev:</span>
                                    {{ $ttl8 }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->

        </div>
        <!-- end container-fluid -->

    </div>
    <!-- end content -->
    @include('admin.modal.beranda')
@endsection

@include('admin.jsfile.beranda')
