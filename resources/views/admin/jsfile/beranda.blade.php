@push('scripts')
    <script>
        $(document).ready(function() {

            $('#BtnCari').on('click', function() {
                $('#ModalCari').modal('show');
            });


            $('.select2').select2({
                placeholder: "Select",
                allowClear: true,
                width: '100%' // biar select-nya tetap full lebar
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
                } else if (value === '3') {

                    $('#bnt').hide();
                    $('#bnt').find('input, select, textarea').prop('required', false);

                    $('#thn_doank').hide();
                    $('#thn_doank').find('input, select, textarea').prop('required', false);
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

        });
    </script>
@endpush
