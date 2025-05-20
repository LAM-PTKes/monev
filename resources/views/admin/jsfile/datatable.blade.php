@push('scripts')
    <script>
        $(document).ready(function() {
            var table = $(".zzz").DataTable({
                //dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                //"<'row'<'col-sm-12'tr>>" + // Tabel
                //"<'row'<'col-sm-5'i><'col-sm-7'p>>", // Info & pagination
                dom: "<'row align-items-end'" + // Tambahan: align items ke bawah
                    "<'col-md-4 d-flex justify-content-start'f>" +
                    "<'col-md-4 d-flex justify-content-center'l>" +
                    "<'col-md-4 d-flex justify-content-end'B>" +
                    ">" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [{
                        extend: "copy",
                        className: "btn-sm"
                    },
                    {
                        extend: "csv",
                        className: "btn-sm"
                    },
                    {
                        extend: "excel",
                        className: "btn-sm"
                    },
                    {
                        extend: "pdf",
                        className: "btn-sm"
                    },
                    {
                        extend: "print",
                        className: "btn-sm"
                    },
                ],
                responsive: true,
                paging: true,
                pageLength: 10,
                lengthMenu: [
                    [5, 10, 25, 50, 75, 100, 250, 500, 750, 1000, -1],
                    [5, 10, 25, 50, 75, 100, 250, 500, 750, 1000, "All"]
                ]
            });

            // Reinitialize tooltips every time table is redrawn
            table.on('draw.dt', function() {
                $('[data-toggle="tooltip"]').tooltip();
            });

            // Reinitialize tooltips when responsive displays child row
            table.on('responsive-display.dt', function(e, datatable, row, showHide, update) {
                $('[data-toggle="tooltip"]').tooltip();
            });
        });
    </script>
@endpush
