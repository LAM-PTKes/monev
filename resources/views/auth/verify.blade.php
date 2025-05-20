@extends('layouts.template')
@section('title')
    Verify Email
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
                            <div class="mb-0">
                                <div class="checkmark">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 161.2 161.2"
                                        enable-background="new 0 0 161.2 161.2" xml:space="preserve">
                                        <path class="path" fill="none" stroke="#4bd396" stroke-miterlimit="10"
                                            d="M425.9,52.1L425.9,52.1c-2.2-2.6-6-2.6-8.3-0.1l-42.7,46.2l-14.3-16.4 c-2.3-2.7-6.2-2.7-8.6-0.1c-1.9,2.1-2,5.6-0.1,7.7l17.6,20.3c0.2,0.3,0.4,0.6,0.6,0.9c1.8,2,4.4,2.5,6.6,1.4c0.7-0.3,1.4-0.8,2-1.5 c0.3-0.3,0.5-0.6,0.7-0.9l46.3-50.1C427.7,57.5,427.7,54.2,425.9,52.1z" />
                                        <circle class="path" fill="none" stroke="#4bd396" stroke-width="4"
                                            stroke-miterlimit="10" cx="80.6" cy="80.6" r="62.1" />
                                        <polyline class="path" fill="none" stroke="#4bd396" stroke-width="6"
                                            stroke-linecap="round" stroke-miterlimit="10"
                                            points="113,52.8 74.1,108.4 48.2,86.4 " />

                                        <circle class="spin" fill="none" stroke="#4bd396" stroke-width="4"
                                            stroke-miterlimit="10" stroke-dasharray="12.2175,12.2175" cx="80.6"
                                            cy="80.6" r="73.9" />

                                    </svg>
                                </div>
                            </div>

                            <p class="text-muted text-center mt-2"> A email has been send to <b
                                    style='color:green;'>{{ auth()->user()->email }}</b>. Please check for an email from
                                company for a verification link. If you did not receive the emai click resend</p>

                            <div class="form-group text-center mt-0">
                                <div class="col-12 d-flex justify-content-center gap-2">
                                    <form method="POST" action="{{ route('verification.resend') }}" class="me-2"
                                        style="margin-right: 12px;">
                                        @csrf

                                        <button class="btn btn-outline-danger width-md waves-effect waves-light"
                                            type="submit">
                                            Resend Verify
                                        </button>
                                    </form>
                                    <a href="{{ route('login') }}">
                                        <button class="btn btn-outline-info width-md waves-effect waves-light"
                                            type="button">
                                            Return To Sign In
                                        </button>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    {{-- <div class="row mt-0">
                        <div class="col-sm-12 text-center">
                            <p class="text-muted">
                                Return to
                                <a href="{{ route('login') }}" class="text-primary ml-1">
                                    <b>Sign In</b>
                                </a>
                            </p>
                        </div>
                    </div> --}}

                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
@endsection
