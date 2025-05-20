$(function () {
    //console.log("Script jalan");
    //console.log("Parsley:", typeof $.fn.parsley);

    const $forms = $("form");

    if ($forms.length && $.fn.parsley) {
        $forms.each(function () {
            const $form = $(this);
            //console.log("Inisialisasi parsley untuk form:", $form);

            $form
                .parsley()
                .on("field:validated", function () {
                    const isValid = $(".parsley-error").length === 0;
                    $(".alert-info").toggleClass("d-none", !isValid);
                    $(".alert-warning").toggleClass("d-none", isValid);
                })
                .on("form:submit", function () {
                    return true;
                });
        });
    } else {
        console.warn("Form tidak ditemukan atau Parsley tidak tersedia");
    }
});
