$(document).ready(function () {

    // $('#datosForm').on('submit',ejecutarAjaxLog);

    // ----------------- Form Validation -------------------

    'use strict';

    $('#passEditForm')[0].addEventListener('submit', function (event) {
        if ($('#passEditForm')[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            ejecutarAjaxLog(event);
        }
        $('#passEditForm')[0].classList.add('was-validated');
    }, false);

    // ----------------- /Form Validation -------------------



    function ejecutarAjaxLog(event) {

        var formData = new FormData(document.getElementById("passEditForm"));


        $.ajax({
            type: 'POST',
            url: '../back/admin/editAdmin.php',
            data: formData,
            encode: true,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',

        })
            .done(function (datosRecibidos) {
                if (!datosRecibidos.exito) {
                    $('#exito').hide();

                    $('#resultado').show();
                    $('#resultado').text(datosRecibidos.message);
                } else {
                    $('#resultado').hide();

                    $('#exito').show();
                    $('#exito').text(datosRecibidos.message);
                    $('html, body').animate({ scrollTop: 0 }, 800);

                }

            });

        event.preventDefault();
    };
});