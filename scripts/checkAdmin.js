$(document).ready(function () {

    // $('#registroForm').on('submit',ejecutarAjax);

    // ----------------- Form Validation -------------------

    'use strict';

    $('#checkForm')[0].addEventListener('submit', function (event) {
        if ($('#checkForm')[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            ejecutarAjax(event);
        }
        $('#checkForm')[0].classList.add('was-validated');
    }, false);

    // ----------------- /Form Validation -------------------


    function ejecutarAjax(event) {

        var datosEnviados = {
            'check_cedula': $("#check_cedula").is(":checked"),
            'check_foto': $("#check_foto").is(":checked"),
            'check_notas': $("#check_notas").is(":checked"),
            'check_fondo': $("#check_fondo").is(":checked"),
            'check_rusnies': $("#check_rusnies").is(":checked"),
            'check_partida': $("#check_partida").is(":checked"),
            'check_metodo': $("#check_metodo").is(":checked"),
            'check_certificado_s': $("#check_certificado_s").is(":checked"),
            'check_solicitud': $("#check_solicitud").is(":checked"),
            'check_datos': $("#check_datos").is(":checked"),


            'idDoc':$("#idDoc").val(),
            'ida': $("#idaCheck").val(),

            'porcentaje':$("#porcentaje").val(),
            'tipoSolicitud':$("#tipoSolicitud").val(),
            'carrera':$("#carrera").val()


        };

        $.ajax({
            type: 'POST',
            url: './back/admin/backCheck.php',
            data: datosEnviados,
            dataType: 'json',
            encode: true
        })
            .done(function (datosRecibidos) {
                if(!datosRecibidos.exito){
                    $('#exitoCheck').hide();
    
                    $('#resultadoCheck').show();
                    $('#resultadoCheck').text(datosRecibidos.message);
                }else{
                    $('#resultadoCheck').hide();
    
                    $('#exitoCheck').show();
                    $('#exitoCheck').text(datosRecibidos.message);
                    $('html, body').animate( { scrollTop : 0 }, 800 );
    
                }
                

                // ========== Registro exitoso! ===========
                // ---- Limpia los campos
                // Elimina las validaciones
                // ========== /Registro exitoso! ===========

            });

        event.preventDefault();

    };

});


