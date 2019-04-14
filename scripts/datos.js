$(document).ready(function () {

    $('#datosForm').on('submit',ejecutarAjaxLog);
    
    
    function ejecutarAjaxLog(event){
    
        var formData = new FormData(document.getElementById("datosForm"));

    
        $.ajax({
            type: 'POST',
            url : './back/estudiante/datosGuardar.php',
            data :formData,
            encode: true,
            cache: false,
            contentType: false,
            processData: false
        })
        .done(function(datosRecibidos){
            console.log(datosRecibidos);

        });
    
        event.preventDefault();
    };
});