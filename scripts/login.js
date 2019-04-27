$(document).ready(function () {

// $('#loginForm').on('submit',ejecutarAjaxLog);

    // ----------------- Form Validation -------------------

    'use strict';

    $('#loginForm')[0].addEventListener('submit', function (event) {
        if ($('#loginForm')[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            ejecutarAjaxLog(event);
        }
        $('#loginForm')[0].classList.add('was-validated');
    }, false);

    // ----------------- /Form Validation -------------------


function ejecutarAjaxLog(event){

    var formData = new FormData(document.getElementById("loginForm"));

    $.ajax({
        type: 'POST',
        url : './back/estudiante/login.php',
        data :formData,
        encode: true,
        cache: false,
        contentType: false,
        processData: false
    })
    .done(function(echo){
        if(echo==1){
            $(location).attr('href','page-dashboard.php');
        }
    });

    event.preventDefault();
};
});