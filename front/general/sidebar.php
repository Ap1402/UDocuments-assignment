<!-- Control de sesion -->
<?php 
include 'back/sessionController.php';
?>


<!-- End of Control de sesion -->

<?php

$admin = 1; // Limitar los enlaces del sidebar de acuerdo al rol

$num_foto = 0;
$num_cedula = 0;
$num_fondo = 0;
$num_notas = 0;
$num_partida = 0;
$num_rusnies = 0;
$num_metodo = 0;

$all = $num_foto > 0 && $num_cedula > 0 && $num_fondo > 0 && $num_notas > 0 && $num_partida > 0 && $num_rusnies > 0 && $num_metodo;

?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center py-5">
    <div class="sidebar-brand-icon">
      <img src="img/varias/logo_ujap_peq.png" width="40%" height="20%" class="d-inline-block align-items-center" alt="">
    </div>
  </a>


  <?php if ($admin == 1) { // Mostrar solo para administradores ?>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="page-dashboard.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Control
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
      aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Inscripcion</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="page-check.php">Validaciones</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true"
      aria-controls="collapseUtilities">
      <i class="fas fa-fw fa-wrench"></i>
      <span>Utilidades</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="page-crear-admin.php">Crear admin</a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="page-charts.php">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Charts</span></a>
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a id="table" class="nav-link" href="page-table.php">
      <i class="fas fa-fw fa-table"></i>
      <span>Alumnos</span></a>
  </li>

  <?php } ?>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Students -->
  <div class="sidebar-heading">
    Alumnos
  </div>

  <!-- Nav Item - Solicitud -->
  <li class="nav-item">
    <a id="solicitud" class="nav-link" href="page-solicitud.php">
      <i class="fas fa-vote-yea"></i>
      <span>Solicitud</span></a>
  </li>

  <!-- Nav Item - Datos -->
  <li class="nav-item">
    <a id="datos" class="nav-link" href="page-datos.php">
      <i class="fas fa-file-alt"></i>
      <span>Datos</span></a>
  </li>
  <?php if (!$all) { // Hacer si NO todos los documentos se cargaron ?>

  <!-- Nav Item - Documentos -->
  <li class="nav-item">
    <a id="docs" class="nav-link" href="page-docs.php">
      <i class="far fa-folder-open"></i>
      <span>Documentos</span></a>
  </li>

  <?php } ?>
  <!-- Nav Item - Edicion Datos/Documentos -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
      aria-controls="collapseOne">
      <i class="fas fa-fw fa-cog"></i>
      <span>Modificar</span>
    </a>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="page-edit-datos.php">Datos</a>
        <a class="collapse-item" href="page-edit-docs.php">Documentos</a>
        <a class="collapse-item" href="page-edit-solicitud.php">Solicitud</a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">


  <!-- Nav Item - Logout -->
  <li class="nav-item">
    <a class="nav-link" data-toggle="modal" data-target="#logoutModal">
      <i class="fas fa-sign-out-alt"></i>
      <span>Cerrar Sesión</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->