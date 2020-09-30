$(document).ready(function () {

    // $('#crearAdmin').on('submit',ejecutarAjaxLog);
    'use strict';
        // ----------------- Form Validation -------------------
        $('#contrasena2').keyup(function(){
            var contrasena2= $('#contrasena2').val();
            var contrasena= $('#contrasena').val();
            if (contrasena2==contrasena){
                $('#registroAdmin').prop( "disabled", false);
                $('#resultadoCrear').hide();

            }else{
                $('#registroAdmin').prop( "disabled", true);
                $('#resultadoCrear').show();
                $('#resultadoCrear').text('Las contraseñas deben coincidir');
            }
        });

        $('#contrasena').keyup(function(){
            var contrasena2= $('#contrasena2').val();
            var contrasena= $('#contrasena').val();
            if (contrasena2==contrasena){
                $('#registroAdmin').prop( "disabled", false);
                $('#resultadoCrear').hide();

            }else{
                $('#registroAdmin').prop( "disabled", true);
                $('#resultadoCrear').show();
                $('#resultadoCrear').text('Las contraseñas deben coincidir');
            }
        });
        
        $('#crearAdmin')[0].addEventListener('submit', function (event) {
            if ($('#crearAdmin')[0].checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            } else {
                ejecutarAjaxLog(event);
            }
            $('#crearAdmin')[0].classList.add('was-validated');
        }, false);
    
        // ----------------- /Form Validation -------------------
    
    
    function ejecutarAjaxLog(event){
    
        var formData = new FormData(document.getElementById("crearAdmin"));

        $.ajax({
            type: 'POST',
            url: '../back/admin/crearAdmin.php',
            data: formData,
            encode: true,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
        })
        .done(function(datosRecibidos){
            if(datosRecibidos.exito){
                $('#resultadoCrear').hide();
                $('#exitoCrear').show();
                $('#exitoCrear').text(datosRecibidos.message);
            }else{
                $('#exitoCrear').hide();
                $('#resultadoCrear').show();
                $('#resultadoCrear').text(datosRecibidos.message);
            };
    });
    event.preventDefault();

};
});