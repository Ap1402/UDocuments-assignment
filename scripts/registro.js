$(document).ready(function () {

    // $('#registroForm').on('submit',ejecutarAjax);

    // ----------------- Form Validation -------------------

    'use strict';

    $('#registroForm')[0].addEventListener('submit', function (event) {
        if ($('#registroForm')[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            ejecutarAjax(event);
        }
        $('#registroForm')[0].classList.add('was-validated');
    }, false);

    // ----------------- /Form Validation -------------------


    function ejecutarAjax(event) {
        var datosEnviados = {
            'p_nombre': $("#p_nombre").val(),
            's_nombre': $("#s_nombre").val(),
            'p_apellido': $("#p_apellido").val(),
            's_apellido': $("#s_apellido").val(),
            'correo': $("#correo").val(),
            'username': $("#username").val(),
            'pregunta': $("#pregunta").val(),
            'respuesta': $("#respuesta").val(),
            'contrasena': $("#contrasena").val(),
            'cedula': $("#cedula").val()
        };
        $.ajax({
            type: 'POST',
            url: './back/estudiante/registro.php',
            data: datosEnviados,
            dataType: 'json',
            encode: true
        })
            .done(function (datosRecibidos) {
                //console.log(datosRecibidos);
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

                if (!datosRecibidos.exito) {
                    $('#exito').hide();

                    $('#resultado').show();
                    $('#resultado').text('Algo salio mal, cedula/username registrada');
                } else {
                    $('#resultado').hide();

                    $('#exito').show();
                    $('#exito').text(datosRecibidos.message);
                    $('html, body').animate({ scrollTop: 0 }, 800);

                }

                

                // ========== Registro exitoso! ===========
                // ---- Limpia los campos
                $('#registroForm')[0].reset();
                // Elimina las validaciones
                $('#registroForm')[0].classList.remove('was-validated');
                // ========== /Registro exitoso! ===========

            });

        event.preventDefault();

    };

});