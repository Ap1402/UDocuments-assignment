<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Validar documentos </title>
	<?php require('back/admin/restriccionAcceso.php');?>

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/images/favicon.ico" type="image/x-icon">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="css/font.css" rel="stylesheet">

  <!-- Custom styles for this template-->

  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="css/dash.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/lightbox.css">
  <link href="css/check.css" rel="stylesheet">

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
        
        <div id="page-admin-check" class="container-fluid">

        <?php


include 'back/conexion.php';
//----------------------------****************************** Documentos **********************
// ------------ Obtener la id del documento
    if (isset($_GET['idd'])) {
      $idd = $_GET['idd'];
      }

    $sql= "SELECT * FROM documentos WHERE id_documento='$idd'";
    $result = mysqli_query($conexion, $sql);

    if ($result->num_rows > 0) {
      $row = mysqli_fetch_assoc($result);
    }else{
      $mensaje = "Ocurrió un error al cargar los documentos";
      echo ($mensaje);
    };

$check_foto = $row['check_foto']; // verificar si fue o no chequeado por control de estudios
$check_cedula = $row['check_cedula'];
$check_fondo = $row['check_fondo'];
$check_notas = $row['check_nota'];
$check_partida = $row['check_partida'];
$check_rusnies = $row['check_rusinies'];
$check_metodo = $row['check_metodo'];

// -------- Porcentaje de Documentos

$porcentaje =  $row['porcentaje'];

// -------- /Porcentaje de Documentos

// Iniciando valores
$ci = $_GET['ci']; // cedula
$mi = $_GET['mi']; // metodo_ingreso
$ida = $_GET['ida']; // id_alumno

$sql_mi = "SELECT * FROM tipo_solicitud
            WHERE tipo='$mi'";
$result_mi = mysqli_query($conexion, $sql_mi);
$row_mi = mysqli_fetch_assoc($result_mi);


// ruta raiz de la imagen
$path_image = 'back/documentos/';

$ultActualizacion = date('Y-m-d');
$nombre_solicitud = $row_mi['nombre_solicitud'];

$check_solicitud = 1; //--------------------------------------------- Estado Solicitud ($row['check_solicitud'])

//----------------------------****************************** /.Documentos **********************


//----------------------------******************************=========== Datos **********************

$consulta = "SELECT * FROM `alumnos` WHERE cedula='" . $ci . "'";
$resultado = mysqli_query($conexion, $consulta);
$datos = mysqli_fetch_array($resultado);

$p_nombre = $datos['p_nombre'];
$s_nombre = $datos['s_nombre'];
$p_apellido = $datos['p_apellido'];
$s_apellido = $datos['s_apellido'];
$cedula = $datos['cedula'];
$correo = $datos['correo'];
$estado_civild = $datos['estado_civil'];

switch ($estado_civild) {
    case 1:
        $estado_civil_name = 'Casado';
        break;
    case 2:
        $estado_civil_name = 'Soltero';
        break;
    case 3:
        $estado_civil_name = 'Divorciado';
        break;
    case 4:
        $estado_civil_name = 'Viudo';
        break;
    default:
        $estado_civil_name = '';
        break;
};

$fecha_nacimiento = $datos['fecha_nacimiento'];

$metodo_ingreso = $datos['metodo_ingreso'];
$carrera = $datos['carrera'];
$pais = $datos['pais_nac'];
$estado = $datos['estado_nac'];
$ciudad = $datos['ciudad_nac'];
$municipio = $datos['municipio_nac'];
$e_nombre = $datos['parientename'];
$parentesco = $datos['parentesco'];
$discapacidad = $datos['discapacidad'];
$i_nombre = $datos['nombreInst'];
$i_egreso = $datos['anoEgreso'];
$i_codigo = $datos['codigoInst'];
$i_estado = $datos['estadoInst'];
$tipo_inst = $datos['tipoInst'];
$discapacidad = $datos['discapacidad'];

switch ($tipo_inst) {
    case 1:
        $tipo_inst_name = 'Privada';
        break;
    case 2:
        $tipo_inst_name = 'Pública';
        break;
    default:
        $tipo_inst_name = '';
        break;
};

$consulta2 = "SELECT * FROM `telefonos` WHERE alumno='" . $ida . "'";
$resultado2 = mysqli_query($conexion, $consulta2);
$datosTelf = mysqli_fetch_array($resultado2);

$movil = $datosTelf['num_movil'];
$habitacion = $datosTelf['num_habitacion'];
$trabajo = $datosTelf['num_trabajo'];
$e_local = $datosTelf['num_habitacion_pariente'];
$e_movil = $datosTelf['num_movil_pariente'];

$consulta3 = "SELECT * FROM `direcciones` WHERE alumno='" . $ida . "'";
$resultado3 = mysqli_query($conexion, $consulta3);
$datosDirecc = mysqli_fetch_array($resultado3);

$nac_estado = $datosDirecc['estado'];
$nac_ciudad = $datosDirecc['ciudad'];
$nac_municipio = $datosDirecc['municipio'];
$nac_urbanizacion = $datosDirecc['urbanizacion'];
$nac_aptcasa = $datosDirecc['aptcasa'];
$nac_calle = $datosDirecc['calle'];
$t_postal = $datosDirecc['postal_trabajo'];
$t_estado = $datosDirecc['estado_trabajo'];
$t_municipio = $datosDirecc['municipio_trabajo'];
$t_ciudad = $datosDirecc['ciudad_trabajo'];
$nac_postal = $datosDirecc['postal_hab'];


//----------------------------******************************=========== /.Datos **********************


?>

<!-- Título de página -->
          <div class="d-sm-flex col-sm-12 col-lg-10 align-items-center justify-content-between mb-4 mx-auto">
            <h1 class="h3 mb-0 text-gray-800">Validar documentos <small> / <b>Cédula:</b> <?=$ci?></small></h1>
            <!-- Boton para el admin (Ir a perfil) -->
            <a href="<?='page-student-perfil.php?ida='.$ida?>" class="d-sm-inline-block btn btn-sm btn-primary text-white shadow-sm">
              <i class="fas fa-user fa-sm"></i>
              Ir a perfil
            </a>
            <!-- /.Boton para el admin (Ir a perfil) -->
          </div>
          <!-- /.Título de página -->

          <!-- Datos del alumno (Editable) -->
          <div class="col-sm-12 col-lg-10 mx-auto">
          <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardDAE" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardDAE">
                  <h6 class="m-0 font-weight-bold text-primary">Datos del alumno (Editable)</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardDAE" style="">
                  <div class="card-body">
                    
 <div class="p-4">
   <form id="datosEditForm" method="POST" class="user needs-validation" novalidate>
     <div class="alert alert-success" role="alert" id="exito" style="display: none"></div>

     <div class="form-group row">
       <div class="col-sm-6">
         <label class="pl-2"><small>Primer nombre</small></label><br>
         <input type="text" id="p_nombre" name="p_nombre" class="form-control form-control-user"
           placeholder="Primer nombre" minlength="2" data-toggle="tooltip" data-placement="top" title="Primer nombre"
           value="<?php echo $p_nombre ?>"
           <?php echo ($rol >= 1) ? 'required' : 'readonly disabled' ?>>
         <div class="invalid-feedback">
           Este campo debe tener al menos 2 caracteres.
         </div>
       </div>
       <div class="col-sm-6">
         <label class="pl-2"><small>Segundo nombre</small></label><br>
         <input type="text" id="s_nombre" name="s_nombre" class="form-control form-control-user"
           placeholder="Segundo nombre" data-toggle="tooltip" data-placement="top" title="Segundo nombre"
           value="<?php echo $s_nombre ?>"
           <?php echo ($rol >= 1) ? '' : 'readonly disabled' ?>>
         <div class="invalid-feedback">
           Este campo debe tener al menos 2 caracteres.
         </div>
       </div>
     </div>
     <div class="form-group row">
       <div class="col-sm-6">
         <label class="pl-2"><small>Primer apellido</small></label><br>
         <input type="text" id="p_apellido" name="p_apellido" class="form-control form-control-user"
           placeholder="Primer apellido" minlength="2" data-toggle="tooltip" data-placement="top"
           title="Primer apellido" value="<?php echo $p_apellido ?>"
           <?php echo ($rol >= 1) ? 'required' : 'readonly disabled' ?>>
         <div class="invalid-feedback">
           Este campo debe tener al menos 2 caracteres.
         </div>
       </div>
       <div class="col-sm-6">
         <label class="pl-2"><small>Segundo apellido</small></label><br>
         <input type="text" id="s_apellido" name="s_apellido" class="form-control form-control-user"
           placeholder="Segundo apellido" minlength="2" data-toggle="tooltip" data-placement="top"
           title="Segundo apellido" value="<?php echo $s_apellido ?>"
           <?php echo ($rol >= 1) ? 'required' : 'readonly disabled' ?>>
         <div class="invalid-feedback">
           Este campo debe tener al menos 2 caracteres.
         </div>
       </div>
     </div>



     <div class="form-group row">
       <div class="col-sm-6 my-auto pt-1">
         <label class="pl-2"><small>Estado civil</small></label><br>
         <select id="estado_civil" name="estado_civil" class="form-control" data-toggle="tooltip" data-placement="top"
           title="Estado civil" required>
           <option selected value="<?php echo $estado_civild ?>">
             <?php echo $estado_civil_name ?>
           </option>
           <option value="1">Casado</option>
           <option value="2">Soltero</option>
           <option value="3">Divorciado</option>
           <option value="4">Viudo</option>
         </select>
         <div class="invalid-feedback">
           Elija una opción.
         </div>
       </div>
       <div class="col-sm-6 my-auto pt-1">
         <label class="pl-2"><small>Fecha de nacimiento</small></label><br>
         <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" data-toggle="tooltip"
           data-placement="top" title="Fecha de nacimiento" value="<?php echo $fecha_nacimiento ?>"
           min="<?php echo date('Y-m-d', strtotime('-150 year')) ?>"
           max="<?php echo date('Y-m-d', strtotime('-10 year')) ?>"
           <?php echo ($rol >= 1) ? 'required' : 'readonly disabled' ?>>
         <div class="invalid-feedback">
           Por favor introduzca una fecha de nacimiento válida.
         </div>
       </div>
     </div>
     <div class="form-group row">
       <div class="col-sm-6 my-auto pt-1">
         <label class="pl-2"><small>Teléfono habitación</small></label><br>
         <input type="number" id="habitacion" name="habitacion" class="form-control"
           placeholder="Teléfono de habitación" min="2400000000" pattern="\d*.{11,13}" data-toggle="tooltip"
           data-placement="top" title="Teléfono de habitación"
           value="<?php echo ($habitacion == 0) ? '' : $habitacion ?>">
         <div class="invalid-feedback">
           Este campo debe tener al menos 11 cifras.
         </div>
       </div>
       <div class="col-sm-6 my-auto pt-1">
         <label class="pl-2"><small>Teléfono móvil</small></label><br>
         <input type="number" id="movil" name="movil" class="form-control" placeholder="Teléfono móvil" min="4100000000"
           pattern="\d*.{11,13}" data-toggle="tooltip" data-placement="top" title="Teléfono móvil"
           value="<?php echo $movil ?>" required>
         <div class="invalid-feedback">
           Este campo debe tener al menos 11 cifras.
         </div>
       </div>
       <div class="col my-auto pt-3">
         <label class="pl-2"><small>Teléfono trabajo</small></label><br>
         <input type="number" id="trabajo" name="trabajo" class="form-control" placeholder="Teléfono de trabajo"
           min="2400000000" pattern="\d*.{11,13}" data-toggle="tooltip" data-placement="top" title="Teléfono de trabajo"
           value="<?php echo ($trabajo == 0) ? '' : $trabajo ?>">
         <div class="invalid-feedback">
           Este campo debe tener al menos 11 cifras.
         </div>
       </div>
     </div>

     <!-- DISCAPACIDAD ---->
     <?php if ($discapacidad != '0') {?>
     <br>

     <div class="text-center">
       <h5 class="text-gray-900 mb-4">Discapacidad</h5>
     </div>
     <hr class="sidebar-divider">

     <div class="form-group row">
       <div class="col-12 my-auto" id="tipo_disc" name="tipo_disc">
         <input type='text' id='tipo_discapacidad' name='tipo_discapacidad' class='form-control form-control-user'
           placeholder='Tipo discapacidad' minlength='4' value="<?php echo $discapacidad ?>">
         <div class='invalid-feedback'>
           Este campo debe tener al menos 4 caracteres.
         </div>
       </div>
     </div>
     <?php }?>
     <br>
     <div class="text-center">
       <h5 class="text-gray-900 mb-4">Lugar de nacimiento</h5>
     </div>
     <hr class="sidebar-divider">

     <div class="form-group row">
       <div class="col-sm-6 my-auto pt-1">
         <label class="pl-2"><small>País</small></label><br>
         <input type="text" id="pais" name="pais" class="form-control form-control-user" placeholder="País"
           minlength="4" data-toggle="tooltip" data-placement="top" title="País" value="<?php echo $pais ?>"
           <?php echo ($rol >= 1) ? 'required' : 'readonly disabled' ?>>
         <div class="invalid-feedback">
           Este campo debe tener al menos 4 caracteres.
         </div>
       </div>
       <div class="col-sm-6 my-auto pt-1">
         <label class="pl-2"><small>Estado</small></label><br>
         <input type="text" id="estado" name="estado" class="form-control form-control-user" placeholder="Estado"
           minlength="4" data-toggle="tooltip" data-placement="top" title="Estado" value="<?php echo $estado ?>"
           <?php echo ($rol >= 1) ? 'required' : 'readonly disabled' ?>>
         <div class="invalid-feedback">
           Este campo debe tener al menos 4 caracteres.
         </div>
       </div>
     </div>

     <div class="form-group row">
       <div class="col-sm-6 my-auto pt-1">
         <label class="pl-2"><small>Ciudad</small></label><br>
         <input type="text" id="ciudad" name="ciudad" class="form-control form-control-user" placeholder="Ciudad"
           minlength="4" data-toggle="tooltip" data-placement="top" title="Ciudad" value="<?php echo $ciudad ?>"
           <?php echo ($rol >= 1) ? 'required' : 'readonly disabled' ?>>
         <div class="invalid-feedback">
           Este campo debe tener al menos 4 caracteres.
         </div>
       </div>
       <div class="col-sm-6 my-auto pt-1">
         <label class="pl-2"><small>Municipio</small></label><br>
         <input type="text" id="municipio" name="municipio" class="form-control form-control-user"
           placeholder="Municipio" minlength="4" data-toggle="tooltip" data-placement="top" title="Municipio"
           value="<?php echo $municipio ?>"
           <?php echo ($rol >= 1) ? 'required' : 'readonly disabled' ?>>
         <div class="invalid-feedback">
           Este campo debe tener al menos 4 caracteres.
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
           placeholder="Zona postal" minlength="4" data-toggle="tooltip" data-placement="top" title="Zona postal"
           value="<?php echo $nac_postal ?>" required>
         <div class="invalid-feedback">
           Este campo debe tener al menos 4 caracteres.
         </div>
       </div>
       <div class="col-sm-6 my-auto pt-1">
         <label class="pl-2"><small>Estado</small></label><br>
         <input type="text" id="nac_estado" name="nac_estado" class="form-control form-control-user"
           placeholder="Estado" minlength="4" data-toggle="tooltip" data-placement="top" title="Estado"
           value="<?php echo $nac_estado ?>" required>
         <div class="invalid-feedback">
           Este campo debe tener al menos 4 caracteres.
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
           Este campo debe tener al menos 4 caracteres.
         </div>
       </div>
       <div class="col-sm-6 my-auto pt-1">
         <label class="pl-2"><small>Municipio</small></label><br>
         <input type="text" id="nac_municipio" name="nac_municipio" class="form-control form-control-user"
           placeholder="Municipio" minlength="4" data-toggle="tooltip" data-placement="top" title="Municipio"
           value="<?php echo $nac_municipio ?>" required>
         <div class="invalid-feedback">
           Este campo debe tener al menos 4 caracteres.
         </div>
       </div>
     </div>
     <div class="form-group row">
       <div class="col-sm-12 col-md-6 col-lg-4 pt-1">
         <label class="pl-2"><small>Urbanización</small></label><br>
         <input type="text" id="nac_urbanizacion" name="nac_urbanizacion" class="form-control form-control-user"
           placeholder="Urbanización" minlength="4" value="<?php echo $nac_urbanizacion ?>" required>
         <div class="invalid-feedback">
           Este campo debe tener al menos 4 caracteres.
         </div>
       </div>
       <div class="col-sm-12 col-md-6 col-lg-4 pt-1">
         <label class="pl-2"><small>Casa o Apartamento</small></label><br>
         <input type="text" id="nac_aptcasa" name="nac_aptcasa" class="form-control form-control-user"
           placeholder="Casa o Apartamento" minlength="4" value="<?php echo $nac_aptcasa ?>" required>
         <div class="invalid-feedback">
           Este campo debe tener al menos 4 caracteres.
         </div>
       </div>
       <div class="col-sm-12 col-md-12 col-lg-4 pt-1">
         <label class="pl-2"><small>Calle</small></label><br>
         <input type="text" id="nac_calle" name="nac_calle" class="form-control form-control-user" placeholder="Calle"
           minlength="4" value="<?php echo $nac_calle ?>" required>
         <div class="invalid-feedback">
           Este campo debe tener al menos 4 caracteres.
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
           placeholder="Zona postal" minlength="4" data-toggle="tooltip" data-placement="top" title="Zona postal"
           value="<?php echo $t_postal ?>">
         <div class="invalid-feedback">
           Este campo debe tener al menos 4 caracteres.
         </div>
       </div>
       <div class="col-sm-6 my-auto pt-1">
         <label class="pl-2"><small>Estado</small></label><br>
         <input type="text" id="t_estado" name="t_estado" class="form-control form-control-user" placeholder="Estado"
           minlength="4" data-toggle="tooltip" data-placement="top" title="Estado" value="<?php echo $t_estado ?>">
         <div class="invalid-feedback">
           Este campo debe tener al menos 4 caracteres.
         </div>
       </div>
     </div>

     <div class="form-group row">
       <div class="col-sm-6 my-auto pt-1">
         <label class="pl-2"><small>Ciudad</small></label><br>
         <input type="text" id="t_ciudad" name="t_ciudad" class="form-control form-control-user" placeholder="Ciudad"
           minlength="4" data-toggle="tooltip" data-placement="top" title="Ciudad" value="<?php echo $t_ciudad ?>">
         <div class="invalid-feedback">
           Este campo debe tener al menos 4 caracteres.
         </div>
       </div>
       <div class="col-sm-6 my-auto pt-1">
         <label class="pl-2"><small>Municipio</small></label><br>
         <input type="text" id="t_municipio" name="t_municipio" class="form-control form-control-user"
           placeholder="Municipio" minlength="4" data-toggle="tooltip" data-placement="top" title="Municipio"
           value="<?php echo $t_municipio ?>">
         <div class="invalid-feedback">
           Este campo debe tener al menos 4 caracteres.
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
           Este campo debe tener al menos 8 caracteres.
         </div>
       </div>
       <div class="col-sm-6 my-auto pt-1">
         <label class="pl-2"><small>Parentesco</small></label><br>
         <input type="text" id="parentesco" name="parentesco" class="form-control form-control-user"
           placeholder="Parentesco" data-toggle="tooltip" minlength="3" data-placement="top" title="Parentesco"
           value="<?php echo $parentesco ?>" required>
         <div class="invalid-feedback">
           Este campo debe tener al menos 3 caracteres.
         </div>
       </div>
     </div>

     <div class="form-group row">
       <div class="col-sm-6 my-auto pt-1">
         <label class="pl-2"><small>Teléfono local</small></label><br>
         <input type="number" id="e_local" name="e_local" class="form-control" placeholder="Teléfono local"
           min="2400000000" pattern="\d*.{11,13}" data-toggle="tooltip" data-placement="top" title="Teléfono de local"
           value="<?php echo ($e_local == 0) ? '' : $e_local ?>">
         <div class="invalid-feedback">
           Este campo debe tener al menos 11 cifras.
         </div>
       </div>
       <div class="col-sm-6 my-auto pt-1">
         <label class="pl-2"><small>Teléfono móvil</small></label><br>
         <input type="number" id="e_movil" name="e_movil" class="form-control" placeholder="Teléfono móvil"
           min="4100000000" pattern="\d*.{11,13}" data-toggle="tooltip" data-placement="top" title="Teléfono móvil"
           value="<?php echo $e_movil ?>" required>
         <div class="invalid-feedback">
           Este campo debe tener al menos 11 cifras.
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
           data-placement="top" title="Nombre de la institución (no abreviar)" value="<?php echo $i_nombre ?>"
           <?php echo ($rol >= 1) ? 'required' : 'readonly disabled' ?>>
         <div class="invalid-feedback">
           Este campo debe tener al menos 11 caracteres.
         </div>
       </div>

     </div>

     <div class="form-group row">
       <div class="col-sm-6 my-auto pt-1">
         <label class="pl-2"><small>Año de egreso</small></label><br>
         <input type="number" id="i_egreso" name="i_egreso" class="form-control" placeholder="Año de egreso" min="1930"
           max="<?php echo date('Y') ?>" pattern="\d*.{4,4}" data-toggle="tooltip" data-placement="top"
           title="Año de egreso" value="<?php echo $i_egreso ?>"
           <?php echo ($rol >= 1) ? 'required' : 'readonly disabled' ?>>
         <div class="invalid-feedback">
           Este campo debe tener solo 4 cifras.
         </div>
       </div>
       <div class="col-sm-6 my-auto pt-1">
         <label class="pl-2"><small>Código de la institución</small></label><br>
         <input type="text" id="i_codigo" name="i_codigo" class="form-control form-control-user"
           placeholder="Código de la institución" minlength="6" data-toggle="tooltip" data-placement="top"
           title="Código de la institución" value="<?php echo $i_codigo ?>"
           <?php echo ($rol >= 1) ? 'required' : 'readonly disabled' ?>>
         <div class="invalid-feedback">
           Este campo debe tener al menos 6 caracteres.
         </div>
       </div>
     </div>

     <div class="form-group row">

       <div class="col-sm-6 my-auto pt-1">
         <label class="pl-2"><small>Estado</small></label><br>
         <input type="text" id="i_estado" name="i_estado" class="form-control form-control-user" placeholder="Estado"
           minlength="4" data-toggle="tooltip" data-placement="top" title="Estado" value="<?php echo $i_estado ?>"
           <?php echo ($rol >= 1) ? 'required' : 'readonly disabled' ?>>
         <div class="invalid-feedback">
           Este campo debe tener al menos 4 caracteres.
         </div>
       </div>
       <div class="col-sm-6 my-auto pt-1">
         <label class="pl-2"><small>Tipo de institución</small></label><br>
         <select id="tipo_inst" name="tipo_inst" class="form-control" data-toggle="tooltip" data-placement="top"
           title="Tipo de institución"
           <?php echo ($rol >= 1) ? 'required' : 'readonly disabled' ?>>
           <option selected value="<?php echo $tipo_inst ?>"><?php echo $tipo_inst_name ?>
           </option>
           <option value="1">Privada</option>
           <option value="2">Pública</option>
         </select>
         <div class="invalid-feedback">
           Elija una opción.
         </div>
       </div>
     </div>

     <div class="alert alert-danger" role="alert" id="resultado" style="display: none;"></div>

     <br>
     <?php if (isset($_GET['ci'])) {?>
     <input id="ci " name="ci " value="<?php echo $_GET['ci'] ?>" hidden>
     <?php }?>

     <?php if (isset($_GET['ida'])) {?>
     <input id="ida" name="ida" value="<?php echo $_GET['ida'] ?>" hidden>
     <?php }?>

     <button id="editDat" type="submit" class="btn btn-primary btn-user btn-block">
       Guardar cambios
     </button>

   </form>
 </div>




                  </div>
                </div>
              </div>
              </div>
              <!-- /.Datos del alumno (Editable) -->

<!-- Formulario Check Documentos -->
<div class="col-sm-12 col-lg-10 mx-auto">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="pl-4 pr-3 py-4">

        <form id="checkForm" method="POST" class="user needs-validation" novalidate>

          <!-- Foto -->
          <div class="form-group row">

            <div class="col-md-12 col-lg-4 text-lg-left my-auto">
              <div class="custom-control custom-switch">
                <input type="checkbox" <?php echo ($check_foto == 0) ? '' : 'checked' ?> class="custom-control-input"
                  id="check_foto">
                <label class="custom-control-label" for="check_foto">
                  <h5 class="text-gray-900 text-justify pl-4">Foto reciente tipo carnet</h5>
                </label>
              </div>
            </div>
            <div class="col-md-12 text-md-center col-lg-8 text-lg-left pt-3 my-auto">

              <div id="preview-images-foto" class="preview-images">

                                      <?php
if ($row['foto'] != '') {
    ?>
                        <div class="thumbnail" style="background-image: url('<?=$path_image . $row['foto']?>')">
                          <div class="close-button-db">
                            <a href="<?=$path_image . $row['foto']?>" data-lightbox="galleryFoto" data-title="foto">
                              <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?=$path_image . $row['foto']?>" download="<?php echo ('foto' . $ci) ?>">
                              <i class="fas fa-download"></i>
                            </a>
                          </div>
                        </div>
                    <?php
}
;
?>              

              </div>

            </div>

          </div>
          <!-- End Foto -->

          <br>
          <hr class="sidebar-divider">
          <br>

          <!-- Cedula -->
          <div class="form-group row">

            <div class="col-md-12 col-lg-4 text-lg-left my-auto">
              <div class="custom-control custom-switch">
                <input type="checkbox" <?php echo ($check_cedula == 0) ? '' : 'checked' ?> class="custom-control-input" id="check_cedula">
                <label class="custom-control-label" for="check_cedula">
                  <h5 class="text-gray-900 text-justify pl-4">Cédula</h5>
                </label>
              </div>
            </div>
            <div class="col-md-12 text-md-center col-lg-8 text-lg-left pt-3 my-auto">

              <div id="preview-images-cedula" class="preview-images">

                <?php
if ($row['cedula'] != '') {
    ?>
                          <div class="thumbnail" style="background-image: url('<?=$path_image . $row['cedula']?>')">
                            <div class="close-button-db">
                              <a href="<?=$path_image . $row['cedula']?>" data-lightbox="galleryCedula" data-title="Cedula">
                                <i class="fas fa-eye"></i>
                              </a>
                              <a href="<?=$path_image . $row['cedula']?>" download="<?php echo ('cedula' . $ci) ?>">
                                <i class="fas fa-download"></i>
                              </a>
                            </div>
                          </div>
                        <?php
}
;
?>

              </div>

            </div>

          </div>
          <!-- End Cedula -->

          <br>
          <hr class="sidebar-divider">
          <br>


          <!-- Notas -->
          <div class="form-group row">

            <div class="col-md-12 col-lg-4 text-lg-left my-auto">
              <div class="custom-control custom-switch">
                <input type="checkbox" <?php echo ($check_notas == 0) ? '' : 'checked' ?> class="custom-control-input"
                  id="check_notas">
                <label class="custom-control-label" for="check_notas">
                  <h5 class="text-gray-900 text-justify pl-4">Notas certificadas de bachillerato (1er a 5to)</h5>
                </label>
              </div>
            </div>
            <div class="col-md-12 text-md-center col-lg-8 text-lg-left pt-3 my-auto">

              <div id="preview-images-Notas" class="preview-images">

              <?php

$sql_notas = "SELECT * FROM notas
                                      WHERE documento = '$idd';";

$result_notas = mysqli_query($conexion, $sql_notas);

if ($result_notas->num_rows > 0) {
    while ($row_notas = mysqli_fetch_assoc($result_notas)) {
        ?>
                          <!-- Esto se repite por cada imagen de Notas -->
                          <div class="thumbnail" style="background-image: url('<?=$path_image . $row_notas['nota']?>')">
                            <div class="close-button-db">
                              <a href="<?=$path_image . $row_notas['nota']?>" data-lightbox="galleryNotas" data-title="Notas">
                                <i class="fas fa-eye"></i>
                              </a>
                              <a href="<?=$path_image . $row_notas['nota']?>" download="<?php echo ('notas' . $ci) ?>">
                                <i class="fas fa-download"></i>
                              </a>
                            </div>
                          </div>
                          <!--  /Esto se repite por cada imagen de Notas -->
                        <?php
}
    ;
}
;
?>
              </div>

            </div>

          </div>
          <!-- End Notas -->

          <br>
          <hr class="sidebar-divider">
          <br>

          <!-- Fondo -->
          <div class="form-group row">

            <div class="col-md-12 col-lg-4 text-lg-left my-auto">
              <div class="custom-control custom-switch">
                <input type="checkbox" <?php echo ($check_fondo == 0) ? '' : 'checked' ?> class="custom-control-input"
                  id="check_fondo">
                <label class="custom-control-label" for="check_fondo">
                  <h5 class="text-gray-900 text-justify pl-4">Título de bachillerato autenticado</h5>
                </label>
              </div>
            </div>
            <div class="col-md-12 text-md-center col-lg-8 text-lg-left pt-3 my-auto">

              <div id="preview-images-fondo" class="preview-images">

               <?php
if ($row['fondo'] != '') {
    ?>
                          <div class="thumbnail" style="background-image: url('<?=$path_image . $row['fondo']?>')">
                            <div class="close-button-db">
                              <a href="<?=$path_image . $row['fondo']?>" data-lightbox="galleryFondo" data-title="Fondo">
                                <i class="fas fa-eye"></i>
                              </a>
                              <a href="<?=$path_image . $row['fondo']?>" download="<?php echo ('fondo' . $ci) ?>">
                                <i class="fas fa-download"></i>
                              </a>
                            </div>
                          </div>
                        <?php
}
;
?>

              </div>

            </div>

          </div>
          <!-- End Fondo -->

          <br>
          <hr class="sidebar-divider">
          <br>

          <!-- Rusnies -->
          <div class="form-group row">

            <div class="col-md-12 col-lg-4 text-lg-left my-auto">
              <div class="custom-control custom-switch">
                <input type="checkbox" <?php echo ($check_rusnies == 0) ? '' : 'checked' ?> class="custom-control-input"
                  id="check_rusnies">
                <label class="custom-control-label" for="check_rusnies">
                  <h5 class="text-gray-900 text-justify pl-4">Resultado del RUSNIES</h5>
                </label>
              </div>
            </div>
            <div class="col-md-12 text-md-center col-lg-8 text-lg-left pt-3 my-auto">

              <div id="preview-images-rusnies" class="preview-images">
             <?php
$sql_rusnies = "SELECT * FROM rusnies
                                        WHERE documento = '$idd';";

$result_rusnies = mysqli_query($conexion, $sql_rusnies);
if ($result_rusnies->num_rows > 0) {
    while ($row_rusnies = mysqli_fetch_assoc($result_rusnies)) {
        ?>
                          <!-- Esto se repite por cada imagen de Rusnies -->
                          <div class="thumbnail" style="background-image: url('<?=$path_image . $row_rusnies['rusnies']?>')">
                            <div class="close-button-db">
                              <a href="<?=$path_image . $row_rusnies['rusnies']?>" data-lightbox="galleryRusnies" data-title="Rusnies">
                                <i class="fas fa-eye"></i>
                              </a>
                              <a href="<?=$path_image . $row_rusnies['rusnies']?>" download="<?php echo ('rusnies' . $ci) ?>">
                                <i class="fas fa-download"></i>
                              </a>
                            </div>
                          </div>
                          <!--  /Esto se repite por cada imagen de Rusnies -->
                        <?php
}
    ;
}
;
?>
              </div>

            </div>

          </div>
          <!-- End rusnies -->

          <br>
          <hr class="sidebar-divider">
          <br>

          <!-- Partida -->
          <div class="form-group row">

            <div class="col-md-12 col-lg-4 text-lg-left my-auto">
              <div class="custom-control custom-switch">
                <input type="checkbox" <?php echo ($check_partida == 0) ? '' : 'checked' ?> class="custom-control-input"
                  id="check_partida">
                <label class="custom-control-label" for="check_partida">
                  <h5 class="text-gray-900 text-justify pl-4">Partida de nacimiento</h5>
                </label>
              </div>
            </div>
            <div class="col-md-12 text-md-center col-lg-8 text-lg-left pt-3 my-auto">

              <div id="preview-images-partida" class="preview-images">

                <?php
if ($row['partida'] != '') {
    ?>
                          <div class="thumbnail" style="background-image: url('<?=$path_image . $row['partida']?>')">
                            <div class="close-button-db">
                              <a href="<?=$path_image . $row['partida']?>" data-lightbox="galleryPartida" data-title="Partida">
                                <i class="fas fa-eye"></i>
                              </a>
                              <a href="<?=$path_image . $row['partida']?>" download="<?php echo ('partida' . $ci) ?>">
                                <i class="fas fa-download"></i>
                              </a>
                            </div>
                          </div>
                        <?php
}
;
?>

              </div>

            </div>

          </div>
          <!-- End Partida -->

          <br>
          <hr class="sidebar-divider">
          <br>

          <!-- Metodo -->
          <div class="form-group row">

            <div class="col-md-12 col-lg-4 text-lg-left my-auto">
              <div class="custom-control custom-switch">
                <input type="checkbox" <?php echo ($check_metodo == 0) ? '' : 'checked' ?> class="custom-control-input"
                  id="check_metodo">
                <label class="custom-control-label" for="check_metodo">
                  <h5 class="text-gray-900 text-justify pl-4">Método de ingreso <br>
                  <small><?php echo $nombre_solicitud ?></small>
                  </h5>
                  
                </label>
              </div>
            </div>
            <div class="col-md-12 text-md-center col-lg-8 text-lg-left pt-3 my-auto">

              <div id="preview-images-metodo" class="preview-images">
              <?php
$sql_metodoing = "SELECT * FROM metodoing
                                          WHERE documento = '$idd';";

$result_metodoing = mysqli_query($conexion, $sql_metodoing);
if ($result_metodoing->num_rows > 0) {
    while ($row_metodoing = mysqli_fetch_assoc($result_metodoing)) {
        ?>
                          <!-- Esto se repite por cada imagen de Metodo -->
                          <div class="thumbnail" style="background-image: url('<?=$path_image . $row_metodoing['metodo']?>')">
                            <div class="close-button-db">
                              <a href="<?=$path_image . $row_metodoing['metodo']?>" data-lightbox="galleryMetodo" data-title="Metodo">
                                <i class="fas fa-eye"></i>
                              </a>
                              <a href="<?=$path_image . $row_metodoing['metodo']?>" download="<?php echo ('metodo' . $ci) ?>">
                                <i class="fas fa-download"></i>
                              </a>
                            </div>
                          </div>
                          <!--  /Esto se repite por cada imagen de Metodo -->
                        <?php
}
    ;
}
;
?>
              </div>

            </div>

          </div>
          <!-- End Metodo -->

          <br>
          <hr class="sidebar-divider">
          <br>

          <!-- Estado Solicitud -->
          <div class="form-group row">

            <div class="col-md-12 col-lg-4 text-lg-left my-auto">
              <div class="custom-control custom-switch">
                <input type="checkbox" <?php echo ($check_solicitud == 0) ? '' : 'checked' ?> class="custom-control-input"
                  id="check_solicitud">
                <label class="custom-control-label" for="check_solicitud">
                  <h5 class="text-gray-900 text-justify pl-4">Estado de solicitud <br>
                    <small><?php echo ($check_solicitud == 0) ? 'Pendiente' : 'Atendida' ?></small>
                  </h5>

                </label>
              </div>
            </div>
            <div class="col-md-12 text-md-center col-lg-8 text-lg-left pt-3 my-auto">

              <div id="preview-images-Estado Solicitud" class="preview-images">
                <div>Ejemplo:</div>
<small>                
                  <div class="custom-control custom-switch d-inline-flex">
                    <input type="checkbox" checked class="custom-control-input" readonly>
                    <label class="custom-control-label">
                      <h5 class="text-gray-900 text-justify pl-2">Atendida<br>
                      </h5>
                    </label>
                  </div>
                  <b class="px-2">|</b>
                  <div class="custom-control custom-switch d-inline-flex">
                    <input type="checkbox" class="custom-control-input" readonly>
                    <label class="custom-control-label">
                      <h5 class="text-gray-900 text-justify pl-2">Pendiente<br>
                      </h5>
                    </label>
                  </div>
</small>
              </div>

            </div>

          </div>
          <!-- End Estado Solicitud -->

          
          <br>
          <input type="text" id="idDoc" value=<?php echo $idd ?> hidden>
          <button id="enviarCheck" type="submit" class="btn btn-primary btn-user btn-block">
            Guardar validaciones
          </button>

        </form>
      </div>
    </div>
  </div>
</div>
<!-- /.Formulario Check Documentos -->


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

  <script src="js/lightbox-plus-jquery.js"></script>
  <script src="scripts/editDatos.js"></script>
  <script src="scripts/checkAdmin.js"></script>


</body>

</html>