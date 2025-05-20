<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta
        content="LAM-PTKes, IAAHEH,Lembaga Akreditasi Mandiri Pendidikan Tinggi Kesehatan Indonesia,Lembaga Akreditasi,Pendidikan Tinggi Kesehatan Indonesia"
        name="description" />
    <meta content="LAM-PTKes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('web/logo-lam-214.png') }}">
    <!-- App css -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"
        id="bootstrap-stylesheet" />
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet" />

    <!-- Notification css (Toastr) -->
    <link href="{{ asset('admin/assets/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
        integrity="sha512-bnIvzh6FU75ZKxp0GXLH9bewza/OIw6dLVh9ICg0gogclmYGguQJWl8U30WpbsGTqbIiAwxTsbe76DErLq5EDQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    @yield('content')
    <!-- Vendor js -->
    <script src="{{ asset('admin/assets/js/vendor.min.js') }}"></script>

    <!-- Plugin js-->
    <script src="{{ asset('admin/assets/libs/parsleyjs/parsley.min.js') }}"></script>

    <!-- Validation init js-->
    <script src="{{ asset('admin/assets/js/pages/form-validation.init.js') }}"></script>

    <!-- Toastr js -->
    <script src="{{ asset('admin/assets/libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/pages/toastr.init.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('admin/assets/js/app.min.js') }}"></script>

    @stack('scripts')
</body>

</html>
