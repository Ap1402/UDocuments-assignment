$(document).ready(function () {

$('#loginForm').on('submit',ejecutarAjaxLog);


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