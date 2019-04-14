$(document).ready(function () {

$('#registroForm').on('submit',ejecutarAjax);

function ejecutarAjax(event){
    var datosEnviados ={
        'p_nombre' : $("#p_nombre").val(),
        's_nombre': $("#s_nombre").val(),
        'p_apellido': $("#p_apellido").val(),
        's_apellido': $("#s_apellido").val(),
        'correo': $("#correo").val(),
        'username': $("#username").val(),
        'contrasena': $("#contrasena").val(),      
        'cedula': $("#cedula").val()
    };
    $.ajax({
        type: 'POST',
        url : 'back/registro.php',
        data :datosEnviados,
        dataType: 'json',
        encode: true
    })
    .done(function(datosRecibidos){
        console.log(datosRecibidos);
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

    });

    event.preventDefault();
    
};

});