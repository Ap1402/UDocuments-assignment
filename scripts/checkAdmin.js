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
            'idDoc':$("#idDoc").val()
        };

        $.ajax({
            type: 'POST',
            url: './back/admin/backCheck.php',
            data: datosEnviados,
            dataType: 'json',
            encode: true
        })
            .done(function (datosRecibidos) {
                console.log(datosRecibidos['message']);
                // if(datosEnviados.exito){
                //     $('#exito').removeAttr('hidden');
                //     $('#exito').text(datosEnviados.mensaje);

                // }else{
                //     $('#resultado').removeAttr('hidden');
                //     if(datosEnviados.errores.usuario)

                //     $('#resultado').text(datosEnviados.errores.usuario);

                //     if(datosEnviados.errores.contra)

                //     $('#resultado').text(datosEnviados.errores.contra);

                //     if(datosEnviados.errores.cedula)

                //     $('#resultado').text(datosEnviados.errores.cedula);
                // }

                

                // ========== Registro exitoso! ===========
                // ---- Limpia los campos
                // Elimina las validaciones
                // ========== /Registro exitoso! ===========

            });

        event.preventDefault();

    };

});


