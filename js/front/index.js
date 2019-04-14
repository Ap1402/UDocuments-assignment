 $(document).ready(function () {

  // Mantener contenido al recargar la pagina

  if (window.location.hash === "#form-registro") {
   // Carga automatico el registro
   $('#registro-login').load('front/access/page-registro.php');

  } else if (window.location.hash === "#form-forgot") {
   // Carga automatico el forgot
   $('#registro-login').load('front/access/page-forgot.php');

  } else if (window.location.hash === "#form-login" || window.location.hash === "") {
   // Carga automatico el login
   $('#registro-login').load('front/access/page-login.php');
  };
  
 });