// ------------------- Funciones para Edit Admin Self
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
// ------------------- /.Funciones para Edit Admin Self

// ------------------- Funciones para Edit Alumno Both
function mostrarContrasenaEditBoth() {
    var pass = document.getElementById("contrasenaEditBoth");
    var pass2 = document.getElementById("contrasena2EditBoth");
    if (pass.type == "password") {
        pass.type = "text";
        pass2.type = "text";
        $('i#showpassBoth,i#showpass2Both').removeClass('fas fa-eye-slash').addClass('fas fa-eye');
    } else {
        pass.type = "password";
        pass2.type = "password";
        $('i#showpassBoth,i#showpass2Both').removeClass('fas fa-eye').addClass('fas fa-eye-slash');
    }
}
    // ------------------- /.Funciones para Edit Alumno Both

$(document).ready(function () {

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
                    $('#exitoAdminSelf').hide();

                    $('#resultadoAdminSelf').show();
                    $('#resultadoAdminSelf').text(datosRecibidos.message);

                } else {
                    $('#resultadoAdminSelf').hide();

                    $('#exitoAdminSelf').show();
                    $('#exitoAdminSelf').text(datosRecibidos.message);
                    $('html, body').animate({
                        scrollTop: 0
                    }, 800);
                    
                }

            });

        event.preventDefault();
    };
    //----------------------- /.Ajax Edit Admin Self


    // ------------------Ajax Edit Alumno Both

    // ----------------- Form Validation -------------------

    $('#passEditFormBoth')[0].addEventListener('submit', function (event) {
        if ($('#passEditFormBoth')[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            ejecutarAjaxPassEditFormBoth(event);
        }
        $('#passEditFormBoth')[0].classList.add('was-validated');
    }, false);

    // ----------------- /.Form Validation -------------------



    function ejecutarAjaxPassEditFormBoth(event) {

        var formData = new FormData(document.getElementById("passEditFormBoth"));


        $.ajax({
            type: 'POST',
            url: './back/estudiante/editAlumno.php',
            data: formData,
            encode: true,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',

        })
            .done(function (datosRecibidos) {
                if (!datosRecibidos.exito) {
                    $('#exitoAlumnoBoth').hide();

                    $('#resultadoAlumnoBoth').show();
                    $('#resultadoAlumnoBoth').text(datosRecibidos.message);

                } else {
                    $('#resultadoAlumnoBoth').hide();

                    $('#exitoAlumnoBoth').show();
                    $('#exitoAlumnoBoth').text(datosRecibidos.message);
                    $('html, body').animate({
                        scrollTop: 0
                    }, 800);
                    
                }

            });

        event.preventDefault();
    };
    //----------------------- /.Ajax Edit Alumno Both

});