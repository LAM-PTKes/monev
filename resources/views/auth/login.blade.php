@extends('layouts.template')
@section('title')
    Login
@endsection
@section('content')
    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">

                        <div class="text-center account-logo-box">
                            <div class="mt-0 mb-0">
                                <a href="{{ url('/') }}">
                                    <span>
                                        <img src="{{ asset('web/logo-lam-214.png') }}" alt="" height="75">
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="form-group text-center mt-2">
                            <b>WebApp Monev</b>
                        </div>

                        @include('alerts.alerts')

                        <div class="card-body">

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" type="email" id="email" name="email" required=""
                                        placeholder="Username">
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="password" required="" id="password"
                                        name="password" placeholder="Password">
                                </div>

                                <div class="form-group d-flex justify-content-between align-items-center">
                                    <div class="custom-control custom-checkbox checkbox-success">
                                        <input type="checkbox" class="custom-control-input" name="ceklogin" id="ceklogin">
                                        <label class="custom-control-label" for="ceklogin">Show Password</label>
                                    </div>
                                    <a href="{{ route('password.request') }}" class="text-muted text-right">
                                        <i class="fa fa-lock mr-1"></i>
                                        Forgot your password?
                                    </a>
                                </div>

                                <div class="form-group text-center mt-2">
                                    <div class="col-12">
                                        <button class="btn btn-outline-danger width-md waves-effect waves-light"
                                            type="submit">
                                            Log In
                                        </button>
                                    </div>
                                </div>

                            </form>

                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-5">
                        <div class="col-sm-12 text-center">
                            <p class="text-muted">Don't have an account? <a href="{{ route('register') }}"
                                    class="text-primary ml-1"><b>Sign Up</b></a></p>
                        </div>
                    </div>

                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->
@endsection
