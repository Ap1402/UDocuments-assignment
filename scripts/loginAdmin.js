$(document).ready(function () {

    // $('#loginForm').on('submit',ejecutarAjaxLog);
    
        // ----------------- Form Validation -------------------
    
        'use strict';
    
        $('#adminForm')[0].addEventListener('submit', function (event) {
            if ($('#adminForm')[0].checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            } else {
                ejecutarAjaxLog(event);
            }
            $('#adminForm')[0].classList.add('was-validated');
        }, false);
    
        // ----------------- /Form Validation -------------------
    
    
        function ejecutarAjaxLog(event){

            var formData = new FormData(document.getElementById("adminForm"));
        
            $.ajax({
                type: 'POST',
                url : './back/admin/loginAdmin.php',
                data :formData,
                encode: true,
                cache: false,
                contentType: false,
                processData: false,
                dataType : 'json',

            })
            .done(function(echo){
                console.log(echo);
                if(echo==1){
                    $(location).attr('href','page-dashboard.php');
                }else{
                    $('#resultadoLogAdmin').show();
                    $('#resultadoLogAdmin').text('Usuario o contraseña incorrecta');
                }
            });
        
            event.preventDefault();
        };
        });