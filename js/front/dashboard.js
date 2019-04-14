 $(document).ready(function () {
  // Carga automatico cada uno de los componentes del front/Dashboard
  // Esto es una prueba para modulizar la mayor parte de la pagina
  
  $('#card-info').load('front/admin/dashboard/card-info.php');

  $('#charts').load('front/admin/dashboard/charts.php');

  $('#card-progress-illustrations').load('front/admin/dashboard/card-progress-illustrations.php');

  // Enlaces para que funcionen los chart (siempre cargar despues de los charts)
  $('#enlaces-charts').load('front/admin/dashboard/enlaces-charts.php');
 });