@extends('layouts.template')
{{-- @extends('layouts.app') --}}
@section('title')
    Reset Password
@endsection
@section('content')
    @error('email')
        <script>
            $(document).ready(function() {
                $.toast({
                    heading: 'Error Email!',
                    text: @json($message),
                    icon: 'error',
                    loaderBg: '#008cff',
                    position: 'top-right',
                    hideAfter: 3000,
                    stack: 1,
                    showHideTransition: 'fade'
                });
            });
        </script>
    @enderror
    @if (session('status'))
        <script>
            $(document).ready(function() {
                $.toast({
                    heading: 'Error Passowrd!',
                    text: @json(session('status')),
                    icon: 'error',
                    loaderBg: '#008cff',
                    position: 'top-right',
                    hideAfter: 3000,
                    stack: 1,
                    showHideTransition: 'fade'
                });
            });
        </script>
    @endif
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">
                        <!-- Logo -->
                        <div class="card-header py-1 text-center bg-dark">
                            <a href="{{ url('/') }}">
                                <span><img src="{{ asset('web/logo-lam-214.png') }}" alt="logo" height="100"></span>
                            </a>
                        </div>

                        <div class="card-body p-2">
                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center pb-0 fw-bold">Reset Password</h4>
                            </div>

                            @error('email')
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <div>Email, {{ $message }}</div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    </button>
                                </div>
                            @enderror

                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <div>Status, {{ session('status') }}</div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    </button>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}" class="needs-validation" novalidate>
                                @csrf

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input class="form-control" type="email" name='email' id="email"
                                        placeholder="Enter your email" required>
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                </div>

                                <div class="mb-3 mb-0 text-center">
                                    <button class="btn btn-outline-primary" type="submit">
                                        <i class=" ri-refresh-line"></i>
                                        Reset
                                    </button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    {{-- <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-white">Already have an account? <a href="{{ route('login') }}"
                                    class="text-info ms-1 link-offset-3 text-decoration-underline"><b>Sign
                                        In</b></a></p>
                        </div> <!-- end col -->
                    </div> --}}
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->
@endsection
