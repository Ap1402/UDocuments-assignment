<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Editar - Datos del alumno </title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/images/favicon.ico" type="image/x-icon">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="css/font.css" rel="stylesheet">

  <!-- Custom styles for this template-->

  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="css/dash.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php require('front/general/sidebar.php'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php require 'front/general/navbar.php'; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <!-- Contenido Variable - Todo lo demas es fijo -->
        <div id="page-student-edit-datos" class="container-fluid">

          <!--
  Oye, sera que se puede mandar una variable que permita editar solo si no ha sido chequeado por control de estudios?
  porque hay veces que uno se equivoca y quiere modificar algunas cosas
  esto optimizaria tiempo, porque sino va a tener que estar diciendole al de control de estudios que se 
  equivoco en tal parte que si lo puede corregir o que se yo.
-->
          <?php
include ('back/conexion.php');

if (isset($_SESSION['cedula'])){
  $cedula=$_SESSION['cedula'];
};

$consulta = "SELECT * FROM `alumnos` WHERE cedula='" . $cedula . "'";
$resultado = mysqli_query($conexion, $consulta);
$datos = mysqli_fetch_array($resultado);

$id=$datos['id_alumno'];
$p_nombre=$datos['p_nombre'];
$s_nombre=$datos['s_nombre'];
$p_apellido=$datos['p_apellido'];
$s_apellido=$datos['s_apellido'];
$cedula=$datos['cedula'];
$correo= $datos['correo'];
$estado_civil=$datos['estado_civil'];

switch ($estado_civil) {
  case 1:
  $estado_civil_name='Casado';
    break;
  case 2:
  $estado_civil_name='Soltero';
      break;
  case 3:
  $estado_civil_name='Divorciado';
      break;
  case 4:
  $estado_civil_name='Viudo';
    break;
  default:
  $estado_civil_name = '';
    break;
};

$fecha_nacimiento=$datos['fecha_nacimiento'];


$metodo_ingreso=$datos['metodo_ingreso'];
$carrera=$datos['carrera'];
$pais=$datos['pais_nac'];
$estado=$datos['estado_nac'];
$ciudad=$datos['ciudad_nac'];
$municipio=$datos['municipio_nac'];
$e_nombre=$datos['parientename'];
$parentesco=$datos['parentesco'];
$discapacidad=$datos['discapacidad'];
$i_nombre=$datos['nombreInst'];
$i_egreso=$datos['anoEgreso'];
$i_codigo=$datos['codigoInst'];
$i_estado=$datos['estadoInst'];
$tipo_inst=$datos['tipoInst'];

switch ($tipo_inst) {
  case 1:
  $tipo_inst_name='Privada';
    break;
  case 2:
  $tipo_inst_name='Pública';
      break;
  default:
  $tipo_inst_name = '';
  break;
};

$consulta2 = "SELECT * FROM `telefonos` WHERE alumno='" . $id . "'";
$resultado2 = mysqli_query($conexion, $consulta2);
$datosTelf = mysqli_fetch_array($resultado2);

$movil=$datosTelf['num_movil'];
$habitacion=$datosTelf['num_habitacion'];
$trabajo=$datosTelf['num_trabajo'];
$e_local=$datosTelf['num_habitacion_pariente'];
$e_movil=$datosTelf['num_movil_pariente'];

$consulta3 = "SELECT * FROM `direcciones` WHERE alumno='" . $id . "'";
$resultado3 = mysqli_query($conexion, $consulta3);
$datosDirecc = mysqli_fetch_array($resultado3);

$nac_estado=$datosDirecc['estado'];
$nac_ciudad=$datosDirecc['ciudad'];
$nac_municipio=$datosDirecc['municipio'];
$nac_urbanizacion=$datosDirecc['urbanizacion'];
$nac_aptcasa=$datosDirecc['aptcasa'];
$nac_calle=$datosDirecc['calle'];
$t_postal=$datosDirecc['postal_trabajo'];
$t_estado=$datosDirecc['estado_trabajo'];
$t_municipio=$datosDirecc['municipio_trabajo'];
$t_ciudad=$datosDirecc['ciudad_trabajo'];





$_SESSION['nivel'] = 1; // probando que sea admin para restringir la edicion de algunos campos
$verificar_check = 1; // verificar si fue o no chequeado por control de estudios

// Iniciando valores


?>

          <!-- Título de página -->
          <div class="d-sm-flex col-sm-12 col-md-10 col-lg-8 align-items-center justify-content-between mb-4 mx-auto">
            <h1 class="h3 mb-0 text-gray-800">Editar - Datos del alumno<br><small class="text-muted"> asegúrese de
                rellenar correctamente sus datos</small></h1>
            <a class="d-none d-sm-inline-block"><i class="fas fa-user-edit fa-2x text-gray-300"></i></a>
          </div>
          <!-- /.Título de página -->

          <!-- Formulario Editar Datos -->
          <div class="col-sm-12 col-md-10 col-lg-8 mx-auto">
            <div class="card shadow mb-4">
              <div class="card-body">
                <div class="p-4">
                  <form id="datosEditForm" method="POST" class="user needs-validation" novalidate>
                    <div class="alert alert-success" role="alert" id="exito" hidden></div>

                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label class="pl-2"><small>Primer nombre</small></label><br>
                        <input type="text" id="p_nombre" name="p_nombre" class="form-control form-control-user"
                          placeholder="Primer nombre" minlength="2" data-toggle="tooltip" data-placement="top"
                          title="Primer nombre" value="<?php echo $p_nombre ?>"
                          <?php echo ($_SESSION['nivel'] == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
                        <div class="invalid-feedback">
                          Por favor introduzca un nombre válido.
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <label class="pl-2"><small>Segundo nombre</small></label><br>
                        <input type="text" id="s_nombre" name="s_nombre" class="form-control form-control-user"
                          placeholder="Segundo nombre" data-toggle="tooltip" data-placement="top" title="Segundo nombre"
                          value="<?php echo $s_nombre ?>"
                          <?php echo ($_SESSION['nivel'] == 1 || $verificar_check == 0) ? '' : 'readonly disabled' ?>>
                        <div class="invalid-feedback">
                          Por favor introduzca un nombre válido.
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label class="pl-2"><small>Primer apellido</small></label><br>
                        <input type="text" id="p_apellido" name="p_apellido" class="form-control form-control-user"
                          placeholder="Primer apellido" minlength="2" data-toggle="tooltip" data-placement="top"
                          title="Primer apellido" value="<?php echo $p_apellido ?>"
                          <?php echo ($_SESSION['nivel'] == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
                        <div class="invalid-feedback">
                          Por favor introduzca un apellido válido.
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <label class="pl-2"><small>Segundo apellido</small></label><br>
                        <input type="text" id="s_apellido" name="s_apellido" class="form-control form-control-user"
                          placeholder="Segundo apellido" minlength="2" data-toggle="tooltip" data-placement="top"
                          title="Segundo apellido" value="<?php echo $s_apellido ?>"
                          <?php echo ($_SESSION['nivel'] == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
                        <div class="invalid-feedback">
                          Por favor introduzca un apellido válido.
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-12 pt-1">
                        <label class="pl-2"><small>Cédula</small></label><br>
                        <input type="number" id="cedula" name="cedula" class="form-control" placeholder="Cédula"
                          data-toggle="tooltip" data-placement="top" title="Cédula" value="<?php echo $cedula ?>"
                          <?php echo ($_SESSION['nivel'] == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
                        <div class="invalid-feedback">
                          Por favor introduzca un número de cédula válido.
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-6 my-auto pt-1">
                        <label class="pl-2"><small>Estado civil</small></label><br>
                        <select id="estado_civil" name="estado_civil" class="form-control" data-toggle="tooltip"
                          data-placement="top" title="Estado civil" required>
                          <option disabled selected value="<?php echo $estado_civil ?>">
                            <?php echo $estado_civil_name ?>
                          </option>
                          <option value="1">Casado</option>
                          <option value="2">Soltero</option>
                          <option value="3">Divorciado</option>
                          <option value="4">Viudo</option>
                        </select>

                      </div>
                      <div class="col-sm-6 my-auto pt-1">
                        <label class="pl-2"><small>Fecha de nacimiento</small></label><br>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"
                          class="form-control form-control-user" data-toggle="tooltip" data-placement="top"
                          title="Fecha de nacimiento" value="<?php echo $fecha_nacimiento ?>" min="1930-07-22"
                          max="<?php echo date('Y-m-d') ?>"
                          <?php echo ($_SESSION['nivel'] == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
                        <div class="invalid-feedback">
                          Por favor introduzca un fecha de nacimiento válido.
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-6 my-auto pt-1">
                        <label class="pl-2"><small>Teléfono habitación</small></label><br>
                        <input type="text" id="habitacion" name="habitacion" class="form-control form-control-user"
                          placeholder="Teléfono de habitación" minlength="11" data-toggle="tooltip" data-placement="top"
                          title="Teléfono de habitación" value="<?php echo $habitacion ?>">
                        <div class="invalid-feedback">
                          Por favor introduzca un teléfono de habitación válido.
                        </div>
                      </div>
                      <div class="col-sm-6 my-auto pt-1">
                        <label class="pl-2"><small>Teléfono móvil</small></label><br>
                        <input type="text" id="movil" name="movil" class="form-control form-control-user"
                          placeholder="Teléfono móvil" minlength="11" data-toggle="tooltip" data-placement="top"
                          title="Teléfono móvil" value="<?php echo $movil ?>" required>
                        <div class="invalid-feedback">
                          Por favor introduzca un teléfono móvil válido.
                        </div>
                      </div>
                      <div class="col my-auto pt-3">
                        <label class="pl-2"><small>Teléfono trabajo</small></label><br>
                        <input type="text" id="trabajo" name="trabajo" class="form-control form-control-user"
                          placeholder="Teléfono de trabajo" minlength="11" data-toggle="tooltip" data-placement="top"
                          title="Teléfono de trabajo" value="<?php echo $trabajo ?>">
                        <div class="invalid-feedback">
                          Por favor introduzca un teléfono de trabajo válido.
                        </div>
                      </div>
                    </div>

                    <br>
                    <div class="text-center">
                      <h5 class="text-gray-900 mb-4">Discapacidad</h5>
                    </div>
                    <hr class="sidebar-divider">

                    <div class="form-group row">
                      <div class="col-12 my-auto" id="tipo_disc" name="tipo_disc">
                        <input type='text' id='tipo_discapacidad' name='tipo_discapacidad'
                          class='form-control form-control-user' placeholder='Tipo discapacidad' minlength='4'
                          value="<?php echo $discapacidad ?>">
                        <div class='invalid-feedback'>
                          Por favor introduzca un Tipo de discapacidad válida.
                        </div>
                      </div>
                    </div>

                    <br>
                    <div class="text-center">
                      <h5 class="text-gray-900 mb-4">Lugar de nacimiento</h5>
                    </div>
                    <hr class="sidebar-divider">

                    <div class="form-group row">
                      <div class="col-sm-6 my-auto pt-1">
                        <label class="pl-2"><small>País</small></label><br>
                        <input type="text" id="pais" name="pais" class="form-control form-control-user"
                          placeholder="País" minlength="4" data-toggle="tooltip" data-placement="top" title="País"
                          value="<?php echo $pais ?>"
                          <?php echo ($_SESSION['nivel'] == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
                        <div class="invalid-feedback">
                          Por favor introduzca un País válido.
                        </div>
                      </div>
                      <div class="col-sm-6 my-auto pt-1">
                        <label class="pl-2"><small>Estado</small></label><br>
                        <input type="text" id="estado" name="estado" class="form-control form-control-user"
                          placeholder="Estado" minlength="4" data-toggle="tooltip" data-placement="top" title="Estado"
                          value="<?php echo $estado ?>"
                          <?php echo ($_SESSION['nivel'] == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
                        <div class="invalid-feedback">
                          Por favor introduzca un Estado válido.
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-6 my-auto pt-1">
                        <label class="pl-2"><small>Ciudad</small></label><br>
                        <input type="text" id="ciudad" name="ciudad" class="form-control form-control-user"
                          placeholder="Ciudad" minlength="4" data-toggle="tooltip" data-placement="top" title="Ciudad"
                          value="<?php echo $ciudad ?>"
                          <?php echo ($_SESSION['nivel'] == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
                        <div class="invalid-feedback">
                          Por favor introduzca un ciudad válido.
                        </div>
                      </div>
                      <div class="col-sm-6 my-auto pt-1">
                        <label class="pl-2"><small>Municipio</small></label><br>
                        <input type="text" id="municipio" name="municipio" class="form-control form-control-user"
                          placeholder="Municipio" minlength="4" data-toggle="tooltip" data-placement="top"
                          title="Municipio" value="<?php echo $municipio ?>"
                          <?php echo ($_SESSION['nivel'] == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
                        <div class="invalid-feedback">
                          Por favor introduzca un municipio válido.
                        </div>
                      </div>
                    </div>

                    <br>
                    <div class="text-center">
                      <h5 class="text-gray-900 mb-4">Dirección de habitación</h5>
                    </div>
                    <hr class="sidebar-divider">

                    <div class="form-group row">
                      <div class="col-sm-6 my-auto pt-1">
                        <label class="pl-2"><small>Zona postal</small></label><br>
                        <input type="text" id="nac_postal" name="nac_postal" class="form-control form-control-user"
                          placeholder="Zona postal" minlength="4" data-toggle="tooltip" data-placement="top"
                          title="Zona postal" value="<?php echo $nac_postal ?>" required>
                        <div class="invalid-feedback">
                          Por favor introduzca una Zona postal válida.
                        </div>
                      </div>
                      <div class="col-sm-6 my-auto pt-1">
                        <label class="pl-2"><small>Estado</small></label><br>
                        <input type="text" id="nac_estado" name="nac_estado" class="form-control form-control-user"
                          placeholder="Estado" minlength="4" data-toggle="tooltip" data-placement="top" title="Estado"
                          value="<?php echo $nac_estado ?>" required>
                        <div class="invalid-feedback">
                          Por favor introduzca un Estado válido.
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-6 my-auto pt-1">
                        <label class="pl-2"><small>Ciudad</small></label><br>
                        <input type="text" id="nac_ciudad" name="nac_ciudad" class="form-control form-control-user"
                          placeholder="Ciudad" minlength="4" data-toggle="tooltip" data-placement="top" title="Ciudad"
                          value="<?php echo $nac_ciudad ?>" required>
                        <div class="invalid-feedback">
                          Por favor introduzca un ciudad válido.
                        </div>
                      </div>
                      <div class="col-sm-6 my-auto pt-1">
                        <label class="pl-2"><small>Municipio</small></label><br>
                        <input type="text" id="nac_municipio" name="nac_municipio"
                          class="form-control form-control-user" placeholder="Municipio" minlength="4"
                          data-toggle="tooltip" data-placement="top" title="Municipio"
                          value="<?php echo $nac_municipio ?>" required>
                        <div class="invalid-feedback">
                          Por favor introduzca un municipio válido.
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12 col-md-6 col-lg-4 pt-1">
                        <label class="pl-2"><small>Urbanización</small></label><br>
                        <input type="text" id="nac_urbanizacion" name="nac_urbanizacion"
                          class="form-control form-control-user" placeholder="Urbanización" minlength="4"
                          value="<?php echo $nac_urbanizacion ?>" required>
                        <div class="invalid-feedback">
                          Por favor introduzca una urbanizacion válida.
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-6 col-lg-4 pt-1">
                        <label class="pl-2"><small>Casa o Apartamento</small></label><br>
                        <input type="text" id="nac_aptcasa" name="nac_aptcasa" class="form-control form-control-user"
                          placeholder="Casa o Apartamento" minlength="4" value="<?php echo $nac_aptcasa ?>" required>
                        <div class="invalid-feedback">
                          Por favor introduzca un apartamento o casa válida.
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-12 col-lg-4 pt-1">
                        <label class="pl-2"><small>Calle</small></label><br>
                        <input type="text" id="nac_calle" name="nac_calle" class="form-control form-control-user"
                          placeholder="Calle" minlength="4" value="<?php echo $nac_calle ?>" required>
                        <div class="invalid-feedback">
                          Por favor introduzca una calle válida.
                        </div>
                      </div>
                    </div>

                    <br>
                    <div class="text-center">
                      <h5 class="text-gray-900 mb-4">Dirección de trabajo</h5>
                    </div>
                    <hr class="sidebar-divider">

                    <div class="form-group row">
                      <div class="col-sm-6 my-auto pt-1">
                        <label class="pl-2"><small>Zona postal</small></label><br>
                        <input type="text" id="t_postal" name="t_postal" class="form-control form-control-user"
                          placeholder="Zona postal" minlength="4" data-toggle="tooltip" data-placement="top"
                          title="Zona postal" value="<?php echo $t_postal ?>">
                        <div class="invalid-feedback">
                          Por favor introduzca una Zona postal válida.
                        </div>
                      </div>
                      <div class="col-sm-6 my-auto pt-1">
                        <label class="pl-2"><small>Estado</small></label><br>
                        <input type="text" id="t_estado" name="t_estado" class="form-control form-control-user"
                          placeholder="Estado" minlength="4" data-toggle="tooltip" data-placement="top" title="Estado"
                          value="<?php echo $t_estado ?>">
                        <div class="invalid-feedback">
                          Por favor introduzca un Estado válido.
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-6 my-auto pt-1">
                        <label class="pl-2"><small>Ciudad</small></label><br>
                        <input type="text" id="t_ciudad" name="t_ciudad" class="form-control form-control-user"
                          placeholder="Ciudad" minlength="4" data-toggle="tooltip" data-placement="top" title="Ciudad"
                          value="<?php echo $t_ciudad ?>">
                        <div class="invalid-feedback">
                          Por favor introduzca un ciudad válido.
                        </div>
                      </div>
                      <div class="col-sm-6 my-auto pt-1">
                        <label class="pl-2"><small>Municipio</small></label><br>
                        <input type="text" id="t_municipio" name="t_municipio" class="form-control form-control-user"
                          placeholder="Municipio" minlength="4" data-toggle="tooltip" data-placement="top"
                          title="Municipio" value="<?php echo $t_municipio ?>">
                        <div class="invalid-feedback">
                          Por favor introduzca un municipio válido.
                        </div>
                      </div>
                    </div>


                    <br>
                    <div class="text-center">
                      <h5 class="text-gray-900 mb-4">Contacto en caso de emergencia</h5>
                    </div>
                    <hr class="sidebar-divider">


                    <div class="form-group row">
                      <div class="col-sm-6 my-auto pt-1">
                        <label class="pl-2"><small>Nombre y apellido</small></label><br>
                        <input type="text" id="e_nombre" name="e_nombre" class="form-control form-control-user"
                          placeholder="Nombre y apellido" minlength="8" data-toggle="tooltip" data-placement="top"
                          title="Nombre y apellido" value="<?php echo $e_nombre ?>" required>
                        <div class="invalid-feedback">
                          Por favor introduzca un nombre válido.
                        </div>
                      </div>
                      <div class="col-sm-6 my-auto pt-1">
                        <label class="pl-2"><small>Parentesco</small></label><br>
                        <input type="text" id="parentesco" name="parentesco" class="form-control form-control-user"
                          placeholder="Parentesco" data-toggle="tooltip" data-placement="top" title="Parentesco"
                          value="<?php echo $parentesco ?>" required>
                        <div class="invalid-feedback">
                          Por favor introduzca un Parentesco válido.
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-6 my-auto pt-1">
                        <label class="pl-2"><small>Teléfono local</small></label><br>
                        <input type="text" id="e_local" name="e_local" class="form-control form-control-user"
                          placeholder="Teléfono local" minlength="11" data-toggle="tooltip" data-placement="top"
                          title="Teléfono de local" value="<?php echo $e_local ?>">
                        <div class="invalid-feedback">
                          Por favor introduzca un teléfono local válido.
                        </div>
                      </div>
                      <div class="col-sm-6 my-auto pt-1">
                        <label class="pl-2"><small>Teléfono móvil</small></label><br>
                        <input type="text" id="e_movil" name="e_movil" class="form-control form-control-user"
                          placeholder="Teléfono móvil" minlength="11" data-toggle="tooltip" data-placement="top"
                          title="Teléfono móvil" value="<?php echo $e_movil ?>" required>
                        <div class="invalid-feedback">
                          Por favor introduzca un teléfono móvil válido.
                        </div>
                      </div>
                    </div>





                    <br>
                    <div class="text-center">
                      <h5 class="text-gray-900 mb-4">Datos título de bachiller</h5>
                    </div>
                    <hr class="sidebar-divider">


                    <div class="form-group row">
                      <div class="col">
                        <label class="pl-2"><small>Nombre de la institución (no abreviar)</small></label><br>
                        <input type="text" id="i_nombre" name="i_nombre" class="form-control form-control-user"
                          placeholder="Nombre de la institución (no abreviar)" minlength="11" data-toggle="tooltip"
                          data-placement="top" title="Nombre de la institución (no abreviar)"
                          value="<?php echo $i_nombre ?>"
                          <?php echo ($_SESSION['nivel'] == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
                        <div class="invalid-feedback">
                          Por favor introduzca un nombre de institución válido.
                        </div>
                      </div>

                    </div>

                    <div class="form-group row">
                      <div class="col-sm-6 my-auto pt-1">
                        <label class="pl-2"><small>Año de egreso</small></label><br>
                        <input type="number" id="i_egreso" name="i_egreso" class="form-control"
                          placeholder="Año de egreso" min="1930" max="<?php echo date('Y') ?>" data-toggle="tooltip"
                          data-placement="top" title="Año de egreso" value="<?php echo $i_egreso ?>"
                          <?php echo ($_SESSION['nivel'] == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
                        <div class="invalid-feedback">
                          Por favor introduzca un año de egreso válido.
                        </div>
                      </div>
                      <div class="col-sm-6 my-auto pt-1">
                        <label class="pl-2"><small>Código de la institución</small></label><br>
                        <input type="text" id="i_codigo" name="i_codigo" class="form-control form-control-user"
                          placeholder="Código de la institución" minlength="6" data-toggle="tooltip"
                          data-placement="top" title="Código de la institución" value="<?php echo $i_codigo ?>"
                          <?php echo ($_SESSION['nivel'] == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
                        <div class="invalid-feedback">
                          Por favor introduzca un código válido.
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">

                      <div class="col-sm-6 my-auto pt-1">
                        <label class="pl-2"><small>Estado</small></label><br>
                        <input type="text" id="i_estado" name="i_estado" class="form-control form-control-user"
                          placeholder="Estado" minlength="4" data-toggle="tooltip" data-placement="top" title="Estado"
                          value="<?php echo $i_estado ?>"
                          <?php echo ($_SESSION['nivel'] == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
                        <div class="invalid-feedback">
                          Por favor introduzca un Estado válido.
                        </div>
                      </div>
                      <div class="col-sm-6 my-auto pt-1">
                        <label class="pl-2"><small>Tipo de institución</small></label><br>
                        <select id="tipo_inst" name="tipo_inst" class="form-control" data-toggle="tooltip"
                          data-placement="top" title="Tipo de institución"
                          <?php echo ($_SESSION['nivel'] == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
                          <option disabled selected value="<?php echo $tipo_inst ?>"><?php echo $tipo_inst_name ?>
                          </option>
                          <option value="1">Privada</option>
                          <option value="2">Pública</option>
                        </select>
                      </div>
                    </div>

                    <div class="alert alert-danger" role="alert" id="resultado" hidden>
                    </div>
                    <br>

                    <button id="editDat" type="submit" class="btn btn-primary btn-user btn-block">
                      Guardar cambios
                    </button>

                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- /.Formulario Editar Datos -->


        </div>
        <!-- /.Contenido Variable - Todo lo demas es fijo -->
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php require 'front/general/footer.php'; ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php require('front/general/modal-logout.php'); ?>
  <!-- End of Logout Modal-->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages / carga automaticamente dashboard.php-->
  <script src="js/sb-admin-2.js"></script>

  <!-- Page level custom scripts -->

</body>

</html>