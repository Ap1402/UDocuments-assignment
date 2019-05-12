<!DOCTYPE html>
<html lang="es">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title> Crear administrador </title>
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
				<div id="page-admin-crear-admin" class="container-fluid">

					<!-- Título de página -->
					<div
						class="d-sm-flex col-sm-12 col-md-10 col-lg-8 align-items-center justify-content-between mb-4 mx-auto">
						<h1 class="h3 mb-0 text-gray-800">Registrar administrador</h1>
						<a class="d-none d-sm-inline-block"><i class="fas fa-user-cog fa-2x text-gray-300"></i></a>
					</div>
					<!-- /.Título de página -->

					<!-- Formulario Crear Admin -->
					<div class="col-sm-12 col-md-10 col-lg-8 mx-auto">
						<div class="card shadow mb-4">
							<div class="card-body">
								<div class="p-4">

									<form id="crearAdmin" method="POST" class="user needs-validation" novalidate>

										<div class="alert alert-success" role="alert" id="exito" style="display: none;"></div>

										<div class="form-group row">
											<div class="col-sm-6">
												<label class="pl-2"><small>Primer nombre</small></label><br>
												<input type="text" id="nombre" name="nombre"
													class="form-control form-control-user" placeholder="Nombre"
													minlength="2" data-toggle="tooltip" data-placement="top"
													title="Nombre" required>
												<div class="invalid-feedback">
													Por favor introduzca un nombre válido.
												</div>
											</div>
											<div class="col-sm-6">
												<label class="pl-2"><small>Nombre de ususario</small></label><br>
												<input type="text" id="username" name="username"
													class="form-control form-control-user"
													placeholder="Nombre de usuario" minlength="4" data-toggle="tooltip"
													data-placement="top" title="Nombre de usuario" required>
												<div class="invalid-feedback">
													Por favor introduzca un nombre de usuario válido.
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="pl-2"><small>Contraseña</small></label><br>
											<div class="input-group">
												<input type="password" id="contrasena" name="contrasena" minlength="4"
													class="form-control form-control-user" placeholder="Contraseña"
													required>
												<div class="input-group-append">
													<a id="show" onclick="mostrarPassword()"
														class="btn btn-primary text-center align-middle">
														<i id="showpass" class="fas fa-eye-slash"></i>
													</a>
												</div>
											</div>
											<div class="invalid-feedback">
												La contraseña debe tener al menos 4 caracteres.
											</div>
										</div>
										<div class="form-group">
											<label class="pl-2"><small>Repetir contraseña</small></label><br>
											<div class="input-group">
												<input type="password" id="contrasena2" name="contrasena2" minlength="4"
													class="form-control form-control-user"
													placeholder="Repetir contraseña" required>
												<div class="input-group-append">
													<a id="show2" onclick="mostrarPassword()"
														class="btn btn-primary text-center align-middle">
														<i id="showpass2" class="fas fa-eye-slash"></i>
													</a>
												</div>
											</div>
											<div class="invalid-feedback">
												La contraseña debe tener al menos 4 caracteres.
											</div>
										</div>

										<div class="form-group">
                      <label class="pl-2"><small>Rol</small></label><br>
                      <select id="rol_admin" name="rol_admin" class="form-control">
                        <option value="1">Personal</option>
                        <option value="2">Asistente</option>
                        <option value="3">Administrador</option>
                      </select>
                    </div>


										<div class="alert alert-danger" role="alert" id="resultado"
											style="display: none;">
										</div>
										<br>
										<button id="registroAdmin" type="submit"
											class="btn btn-primary btn-user btn-block">
											Crear administrador
										</button>

									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- /.Formulario Crear Admin -->

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

	<script src="scripts/crearAdmin.js"></script>

	<script type="text/javascript">
		function mostrarPassword() {
			var pass = document.getElementById("contrasena");
			var pass2 = document.getElementById("contrasena2");
			if (pass.type == "password") {
				pass.type = "text";
				pass2.type = "text";
				$('i#showpass,i#showpass2').removeClass('fas fa-eye-slash').addClass('fas fa-eye');
			} else {
				pass.type = "password";
				pass2.type = "password";
				$('i#showpass,i#showpass2').removeClass('fas fa-eye').addClass('fas fa-eye-slash');
			}
		}
	</script>

</body>

</html>