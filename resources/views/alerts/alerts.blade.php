@push('scripts')
    <script>
        $(document).ready(function() {
            $("form").parsley();

            if ($('#ceklogin').length && $('#password').length) {
                $('#ceklogin').on('change', function() {
                    const type = $(this).is(':checked') ? 'text' : 'password';
                    $('#password').attr('type', type);
                });
            }
        });
    </script>

    @error('email')
        <script>
            $(document).ready(function() {
                // Konfigurasi toastr
                toastr.options = {
                    "closeButton": true,
                    "debug": true,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };

                // Menampilkan toast saat page load
                toastr["error"](@json($message), "Error Email");
            });
        </script>
    @enderror

    @error('password')
        <script>
            $(document).ready(function() {
                // Konfigurasi toastr
                toastr.options = {
                    "closeButton": true,
                    "debug": true,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };

                // Menampilkan toast saat page load
                toastr["error"](@json($message), "Error Password");
            });
        </script>
    @enderror

    @error('name')
        <script>
            $(document).ready(function() {
                // Konfigurasi toastr
                toastr.options = {
                    "closeButton": true,
                    "debug": true,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };

                // Menampilkan toast saat page load
                toastr["error"](@json($message), "Error Name");
            });
        </script>
    @enderror

    @if (session('resent'))
        <script>
            $(document).ready(function() {
                // Konfigurasi toastr
                toastr.options = {
                    "closeButton": true,
                    "debug": true,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };

                // Menampilkan toast saat page load
                toastr["success"]('Please check your email for a verification link.', "Check Your Email");
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            $(document).ready(function() {
                // Konfigurasi toastr
                toastr.options = {
                    "closeButton": true,
                    "debug": true,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };

                // Menampilkan toast saat page load
                toastr["success"](@json(session('success')), "Berhasil");
            });
        </script>
    @endif

    @if (session('delete'))
        <script>
            $(document).ready(function() {
                // Konfigurasi toastr
                toastr.options = {
                    "closeButton": true,
                    "debug": true,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };

                // Menampilkan toast saat page load
                toastr["warning"](@json(session('delete')), "Success");
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            $(document).ready(function() {
                // Konfigurasi toastr
                toastr.options = {
                    "closeButton": true,
                    "debug": true,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };

                // Menampilkan toast saat page load
                toastr["error"](@json(session('error')), "Error");
            });
        </script>
    @endif


    {{-- <script>
        console.log('jQuery version:', typeof $ !== 'undefined' ? $.fn.jquery : 'jQuery NOT loaded');
    </script> --}}
@endpush


@error('email')
    <div class="form-group text-center mt-0">
        <div class="col-12">
            <div class="alert alert-icon alert-danger alert-dismissible fade show mb-0" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="mdi mdi-block-helper mr-2"></i>
                <strong>Erorr!</strong> {{ $message }}.
            </div>
        </div>
    </div>
@enderror

@error('password')
    <div class="form-group text-center mt-0">
        <div class="col-12">
            <div class="alert alert-icon alert-danger alert-dismissible fade show mb-0" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="mdi mdi-block-helper mr-2"></i>
                <strong>Erorr!</strong> {{ $message }}.
            </div>
        </div>
    </div>
@enderror

@error('name')
    <div class="form-group text-center mt-0">
        <div class="col-12">
            <div class="alert alert-icon alert-danger alert-dismissible fade show mb-0" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="mdi mdi-block-helper mr-2"></i>
                <strong>Erorr!</strong> {{ $message }}.
            </div>
        </div>
    </div>
@enderror

@if (session('resent'))
    <div class="form-group text-center mt-0">
        <div class="col-12">
            <div class="alert alert-icon alert-success alert-dismissible fade show mb-0" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="mdi mdi-block-helper mr-2"></i>
                <strong>Success!!!</strong> {{ __('A fresh verification link has been sent to your email address.') }}.
            </div>
        </div>
    </div>
@endif

@if (session('delete'))
    <div class="alert alert-icon alert-warning alert-dismissible fade show mb-3 mt-3" role="alert">
        <i class="mdi mdi-alert mr-2"></i>
        <h5 class="alert-heading d-inline">Attention!</h5>
        <span>{{ session('delete') }}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-icon alert-success alert-dismissible fade show mb-3 mt-3" role="alert">
        <i class="mdi mdi-check-all mr-2"></i>
        <h5 class="alert-heading d-inline">Well done!</h5>
        <span>{{ session('success') }}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show mb-3 mt-3" role="alert">
        <i class="mdi mdi-block-helper mr-2"></i>
        <h5 class="alert-heading d-inline">Error!</h5>
        <span>{{ session('error') }}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
