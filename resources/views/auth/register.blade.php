{{-- @extends('layouts.template')
@section('title')
    Register
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

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group">
                                    <input class="form-control" type="text" id="name" name="name" required=""
                                        placeholder="Full Name">
                                </div>

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

                                </div>

                                <div class="form-group text-center mt-2">
                                    <div class="col-12">
                                        <button class="btn btn-outline-danger width-md waves-effect waves-light"
                                            type="submit">
                                            Register
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
                            <p class="text-white">Already account? <a href="{{ route('login') }}"
                                    class="text-info ml-1"><b>Sign In</b></a></p>
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
@endsection --}}

{{ abort(404) }}
