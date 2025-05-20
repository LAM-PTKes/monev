@extends('layouts.template')
@section('title')
    Error 419
@endsection
@section('content')

    <body class="authentication-bg">
        <div class="home-btn d-none d-sm-block">
            <a href="{{ route('home') }}"><i class="fas fa-home h2"></i></a>
        </div>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-9 text-center">

                        <div class="wrapper-page">
                            {{-- <img src="{{ asset('admin/assets/images/animat-customize-color.gif') }}" alt=""
                                height="120"> --}}
                            <div style="position: relative; width: 100%; height: 370px; overflow: hidden;">
                                <img src="{{ asset('web/419.svg') }}" alt=""
                                    style="width: 100%; height: 100%; object-fit: contain; display: block;">
                            </div>
                            <h3 class="text-uppercase text-danger">Error 419 Page Expired</h3>
                            <a class="btn btn-success waves-effect waves-light mb-0 mt-0" href="{{ route('home') }}"> Return
                                Home</a>
                        </div>
                    </div>

                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    @endsection
