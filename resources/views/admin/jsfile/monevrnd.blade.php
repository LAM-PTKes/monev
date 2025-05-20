@push('scripts')
    <script>
        $(document).ready(function() {
            $('#BtnAdd').on('click', function() {
                $('#ModalAdd').modal('show');
            });

            $('#BtnFormat').on('click', function() {
                $('#ModalFormat').modal('show');
            });

            $('#BtnUpload').on('click', function() {
                $('#ModalUpload').modal('show');
            });

            $('#BtnCari').on('click', function() {
                $('#ModalCari').modal('show');
            });

            $(document).on('click', '.edit', function() {
                let data = $(this).val().split('~');

                $('#ModalEdit').modal('show');
                $('#id').val(data[0]);
                $('#eunt').val(data[1]).trigger('change');
                $('#easpek').val(data[2]);
                $('#eindikator').val(data[3]);
                $('#ekategori').val(data[4]);
                $('#esatuan').val(data[5]);
                $('#ebahan').val(data[6]);
                $('#emetode').val(data[7]);
                $('#ekriteria').val(data[8]);
                $('#ehasil_tw_I').val(data[9]);
                $('#ehasil_tw_II').val(data[10]);
                $('#ehasil_tw_III').val(data[11]);
                $('#ehasil_tw_IV').val(data[12]);
                $('#ejanuari').val(data[13]);
                $('#efebruari').val(data[14]);
                $('#emaret').val(data[15]);
                $('#eapril').val(data[16]);
                $('#emei').val(data[17]);
                $('#ejuni').val(data[18]);
                $('#ejuli').val(data[19]);
                $('#eagustus').val(data[20]);
                $('#eseptember').val(data[21]);
                $('#eoktober').val(data[22]);
                $('#enovember').val(data[23]);
                $('#edesember').val(data[24]);
                $('#ecatatan').val(data[25]);
                $('#epic').val(data[26]);
                $('#efrm').val(data[27]).trigger('change');
                $('#ethn').datepicker('setDate', data[28]);
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

            $('.dropify').dropify({
                messages: {
                    'default': 'Drag or drop to select an Excel file',
                    'replace': 'Drag or drop to replace',
                    'remove': 'Remove',
                    'error': 'Ooops, something wrong happened.'
                },
                error: {
                    'fileExtension': 'Only .xlsx and .xls files are allowed.'
                }
            });

            // Validasi saat file dipilih
            $('.dropify').on('change', function(e) {
                var file = this.files[0];
                if (file) {
                    var ext = file.name.split('.').pop().toLowerCase();
                    if (ext !== 'xls' && ext !== 'xlsx') {
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
                        toastr["error"]("File Extension .xlsx & .xls", "Error");
                        // Bersihkan file yang salah
                        var drEvent = $(this).dropify();
                        drEvent = drEvent.data('dropify');
                        drEvent.resetPreview();
                        drEvent.clearElement();
                    }
                }
            });

            $(".tahun").datepicker({
                autoclose: !0,
                todayHighlight: !0,
                format: 'dd-mm-yyyy',
                orientation: 'auto',
            });

            $(".bln").datepicker({
                autoclose: !0,
                todayHighlight: !0,
                startView: "months",
                minViewMode: "months",
                format: 'yyyy-mm',
                orientation: 'auto',
            });

            $(".thndoank").datepicker({
                autoclose: !0,
                todayHighlight: !0,
                startView: "years",
                minViewMode: "years",
                format: 'yyyy',
                orientation: 'auto',
            });

            $('#cari').on('change', function() {
                var value = $(this).val();

                if (value === '1') {
                    $('#bnt').show();
                    $('#bnt').find('input, select, textarea').prop('required', true);

                    $('#thn_doank').hide();
                    $('#thn_doank').find('input, select, textarea').prop('required', false);
                } else if (value === '2') {

                    $('#bnt').hide();
                    $('#bnt').find('input, select, textarea').prop('required', false);

                    $('#thn_doank').show();
                    $('#thn_doank').find('input, select, textarea').prop('required', true);
                } else {
                    $('#bnt').hide();
                    $('#bnt').find('input, select, textarea').prop('required', false);

                    $('#thn_doank').hide();
                    $('#thn_doank').find('input, select, textarea').prop('required', false);
                }
            });

            $('#bnt').hide();
            $('#thn_doank').hide();
            $('#bnt').find('input, select, textarea').prop('required', false);
            $('#thn_doank').find('input, select, textarea').prop('required', false);

            $('#FrmUpload').on('submit', function(e) {
                var submitButton = $(this).find('button[type="submit"]');

                // Disable button
                submitButton.prop('disabled', true);

                // Ganti isi button dengan spinner dan teks loading
                submitButton.html(
                    `<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span> Loading...`
                );
            });


            $('#BtnExp').on('click', function() {
                $('#ModalExp').modal('show');
            });

            $(document).on('click', '.tw', function() {
                // console.log($(this).val());
                var str = $(this).val();
                $("#ModalEva").modal('show');

                $.ajax({
                    url: "{{ route('HasilEvaluasi') }}?q=" + str,
                    type: "GET",
                    // data : {'_token' : csrf_token},
                    success: function(data) {
                        //console.log(data);
                        $("#tbldetail").html(data);
                    }
                });
            });

        });
    </script>
    <script>
        !(function(e) {
            "use strict";
            var t = function() {};
            (t.prototype.createBasic = function(t) {
                return (
                    t.children("div").steps({
                        headerTag: "h3",
                        bodyTag: "section",
                        transitionEffect: "slideLeft",
                        onFinishing: function(t, i) {
                            return console.log("Form has been validated!"), !0;
                        },
                        onFinished: function(t, i) {
                            console.log(
                                    "Form can be submitted using submit method. E.g. $('#basic-form').submit()"
                                ),
                                e("#basic-form").submit();
                        },
                    }),
                    t
                );
            }),
            (t.prototype.createValidatorForm = function(n) {
                return (
                    n.validate({

                        errorPlacement: function(t, i) {
                            t.addClass('text-danger mt-1 d-block');

                            if (i.hasClass("select2-hidden-accessible")) {
                                // Jika pakai Select2
                                t.insertAfter(i.next('.select2'));
                            } else if (i.parent('.input-group').length) {
                                // Jika elemen berada dalam input group (seperti datepicker)
                                t.insertAfter(i.parent());
                            } else {
                                t.insertAfter(i);
                            }
                        },

                    }),
                    n.children("div").steps({
                        headerTag: "h3",
                        bodyTag: "section",
                        transitionEffect: "slideLeft",
                        onStepChanging: function(t, i, e) {
                            return (
                                (n.validate().settings.ignore =
                                    ":disabled,:hidden"),
                                n.valid()
                            );
                        },
                        onFinishing: function(t, i) {
                            return (
                                (n.validate().settings.ignore = ":disabled"),
                                n.valid()
                            );
                        },
                        onFinished: function(t, i) {
                            //alert("xxx");
                            var finishBtn = $('a[href="#finish"]');
                            finishBtn.addClass('disabled');
                            finishBtn.html(
                                '<span class="spinner-border spinner-border-sm" style="margin-right: 0.5rem;" role="status" aria-hidden="true"></span>Loading...'

                            );

                            var routeUrl = "{{ route('cMonevRnD') }}";
                            var form = e("#WZDD"); // Assuming your form has the id 'WZDD'
                            form.attr('action', routeUrl); // Set the route URL
                            form.submit(); // Submit the form
                        },
                    }),
                    n
                );
            }),
            (t.prototype.createVertical = function(form) {
                // Inisialisasi validasi
                form.validate({
                    errorPlacement: function(error, element) {
                        error.addClass('text-danger mt-1 d-block');

                        if (element.hasClass("select2-hidden-accessible")) {
                            // Jika pakai Select2
                            error.insertAfter(element.next('.select2'));
                        } else if (element.parent('.input-group').length) {
                            // Jika elemen berada dalam input group (seperti datepicker)
                            error.insertAfter(element.parent());
                        } else {
                            error.insertAfter(element);
                        }
                    },
                });

                // Inisialisasi steps dengan orientasi vertikal
                form.steps({
                    headerTag: "h3",
                    bodyTag: "section",
                    transitionEffect: "fade",
                    stepsOrientation: "vertical",

                    // Validasi saat berpindah langkah
                    onStepChanging: function(event, currentIndex, newIndex) {
                        form.validate().settings.ignore = ":disabled,:hidden";
                        return form.valid();
                    },
                    onFinishing: function(event, currentIndex) {
                        form.validate().settings.ignore = ":disabled";
                        return form.valid();
                    },
                    onFinished: function(event, currentIndex) {

                        var routeUrl = "{{ route('eMonevRnD') }}";
                        var finishBtn = $('a[href="#finish"]');
                        finishBtn.addClass('disabled');
                        finishBtn.html(
                            '<span class="spinner-border spinner-border-sm" style="margin-right: 0.5rem;" role="status" aria-hidden="true"></span>Loading...'

                        );
                        //alert("yyy");
                        form.attr('action', routeUrl);
                        form.submit();
                    }
                });

                return form;
            }),

            (t.prototype.init = function() {
                this.createBasic(e("#basic-form")),
                    this.createValidatorForm(e("#WZDD")),
                    this.createVertical(e("#WZVT"));
            }),
            (e.FormWizard = new t()),
            (e.FormWizard.Constructor = t);
        })(window.jQuery),
        (function(t) {
            "use strict";
            window.jQuery.FormWizard.init();
        })();
    </script>
@endpush
