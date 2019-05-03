<!-- Formulario Crear Admin -->
<div class="col-sm-12 col-md-10 col-lg-8 mx-auto">
	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="p-4">
				<div class="text-center">
					<h1 class="h4 text-gray-900 mb-4">Crear administrador
					</h1>
				</div>
				<form id="crearAdmin" method="POST" class="user needs-validation" novalidate>
					<div class="alert alert-success" role="alert" id="exito" hidden></div>
					<br>

					<div class="form-group row">
						<div class="col-sm-6">
							<input type="text" id="nombre" name="nombre" class="form-control form-control-user"
								placeholder="Primer nombre" minlength="2" data-toggle="tooltip" data-placement="top"
								title="Primer nombre" required>
							<div class="invalid-feedback">
								Por favor introduzca un nombre válido.
							</div>
						</div>
						<div class="col-sm-6">
							<input type="text" id="username" name="username" class="form-control form-control-user"
								placeholder="Nombre de usuario" minlength="4" data-toggle="tooltip" data-placement="top"
								title="Nombre de usuario" required>
							<div class="invalid-feedback">
								Por favor introduzca un nombre de usuario válido.
							</div>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-6">
							<input type="email" id="correo" name="correo" class="form-control form-control-user"
								placeholder="Correo" data-toggle="tooltip" data-placement="top" title="Correo" required>
							<div class="invalid-feedback">
								Por favor introduzca un correo válido.
							</div>
						</div>
						<div class="col-sm-6">
							<input type="number" id="cedula" name="cedula" class="form-control" placeholder="Cédula"
								data-toggle="tooltip" data-placement="top" title="Cédula" required>
							<div class="invalid-feedback">
								Por favor introduzca un número de cédula válido.
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-6 my-auto">
							<input type="password" id="contrasena" name="contrasena"
								class="form-control form-control-user" placeholder="Contraseña" data-toggle="tooltip"
								data-placement="top" title="Contraseña" required>
							<div class="invalid-feedback">
								La contraseña debe tener al menos 8 carateres.
							</div>
						</div>
						<div class="col-sm-6 my-auto">
							<input type="password" id="contrasena2" name="contrasena2"
								class="form-control form-control-user" placeholder="Confirmar contraseña"
								data-toggle="tooltip" data-placement="top" title="Confirmar contraseña" required>
							<div class="invalid-feedback">
								La contraseña debe tener al menos 8 carateres.
							</div>
						</div>
					</div>
					<br>
					<div class="alert alert-danger" role="alert" id="resultado" hidden>
					</div>
					<br>
					<button id="registroAdmin" type="submit" class="btn btn-primary btn-user btn-block">
						Crear administrador
					</button>

				</form>
			</div>
		</div>
	</div>
</div>