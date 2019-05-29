$(document).ready(function () {
    'use strict';

    $('#datosEditForm').on('submit',ejecutarAjaxLog);    
    
    function ejecutarAjaxLog(event){
    
        var formData = new FormData(document.getElementById("datosEditForm"));

        document.getElementById("prevBtn").style.display = "none";
        document.getElementById("nextBtn").style.display = "none";
        preload.classList.add('activate-preload');
    
        $.ajax({
            type: 'POST',
            url : './back/estudiante/datosGuardarEdit.php',
            data :formData,
            encode: true,
            cache: false,
            contentType: false,
            processData: false,
            dataType : 'json'

        })
        .done(function(datosRecibidos){
            if(!datosRecibidos.exito){
                $('#exito').hide();

                $('#resultado').show();
                $('#resultado').text(datosRecibidos.message);

                document.getElementById("prevBtn").style.display = "inline";
                document.getElementById("nextBtn").style.display = "inline";
            }else{
                $('#resultado').hide();

                $('#exito').show();
                $('#exito').text(datosRecibidos.message);
                $('html, body').animate( { scrollTop : 0 }, 800 );

                preload.classList.remove('activate-preload');

                // --------- Mostrar el inicio del formulario
                var x = document.getElementsByClassName("tab");
                x[0].style.display = "block";
                currentTab = 0;

                document.getElementById("nextBtn").style.display = "inline";
                $("#nextBtn").attr('type', 'button');

                if(x.length == 1){ 

                    document.getElementById("nextBtn").innerHTML = "Enviar";
                                     
                    $('#ver-todo').hide();
                    $('#ver-secciones').show();
                     
                }else{
                    document.getElementById("nextBtn").innerHTML = "Siguiente";

                    $('#ver-todo').show();
                    $('#ver-secciones').hide();
                    
                }
                
                // --------- /.Mostrar el inicio del formulario

            }
            
        });
    
        event.preventDefault();
    };
});