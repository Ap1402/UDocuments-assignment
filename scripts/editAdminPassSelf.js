$(document).ready(function () {

    $('#btnEditarSelf').on("click", function () {
        $('#editarAdminSelfModal').modal('toggle');
    });

    // ------------------Ajax Edit Admin Self

    // ----------------- Form Validation -------------------

    $('#passEditFormSelf')[0].addEventListener('submit', function (event) {
        if ($('#passEditFormSelf')[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            ejecutarAjaxPassEditFormSelf(event);
        }
        $('#passEditFormSelf')[0].classList.add('was-validated');
    }, false);

    // ----------------- /.Form Validation -------------------



    function ejecutarAjaxPassEditFormSelf(event) {

        var formData = new FormData(document.getElementById("passEditFormSelf"));


        $.ajax({
            type: 'POST',
            url: './back/admin/editAdminSelf.php',
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
                    $('html, body').animate({
                        scrollTop: 0
                    }, 800);
                    tablaInicio();
                }

            });

        event.preventDefault();
    };
    //----------------------- /.Ajax Edit Admin Self


    function mostrarContrasenaEditSelf() {
        var pass = document.getElementById("contrasenaEditSelf");
        var pass2 = document.getElementById("contrasena2EditSelf");
        if (pass.type == "password") {
            pass.type = "text";
            pass2.type = "text";
            $('i#showpassSelf,i#showpass2Self').removeClass('fas fa-eye-slash').addClass('fas fa-eye');
        } else {
            pass.type = "password";
            pass2.type = "password";
            $('i#showpassSelf,i#showpass2Self').removeClass('fas fa-eye').addClass('fas fa-eye-slash');
        }
    }

    $("#botonMostrarContrasenaEditSelf").click(function () {
        if ($("#botonMostrarContrasenaEditSelf").is(':checked')) {
            $('#contrasenaMostrarEditSelf').show();
            $('#contrasenaEditSelf').val('');
            $('#contrasena2EditSelf').val('');

        } else {
            $('#contrasenaMostrarEditSelf').hide();
            $('#contrasenaEditSelf').val('');
            $('#contrasena2EditSelf').val('');

        }
    });
});