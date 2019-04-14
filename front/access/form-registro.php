<div class="col-lg-3 d-none d-lg-block bg-register-image"></div>
<div class="col-sm-12 col-md-10 col-lg-9">
	<div class="p-5">
		<div class="text-center">
			<h1 class="h4 text-gray-900 mb-4">Crear una cuenta!</h1>
		</div>
		<form id="registroForm" method="POST" class="user needs-validation" validate>
			<div class="alert alert-success" role="alert" id="exito" hidden></div>
			<div class="form-group row">
				<div class="col-sm-6">
					<input type="text" id="p_nombre" name="p_nombre" class="form-control form-control-user"
						placeholder="Primer nombre" minlength="2" required>
					<div class="invalid-feedback">
						Por favor introduzca un nombre válido.
					</div>
				</div>
				<div class="col-sm-6">
					<input type="text" id="s_nombre" name="s_nombre" class="form-control form-control-user"
						placeholder="Segundo nombre" required>
					<div class="invalid-feedback">
						Por favor introduzca un nombre válido.
					</div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-6">
					<input type="text" id="p_apellido" name="p_apellido" class="form-control form-control-user"
						placeholder="Primer apellido" minlength="2" required>
					<div class="invalid-feedback">
						Por favor introduzca un apellido válido.
					</div>
				</div>
				<div class="col-sm-6">
					<input type="text" id="s_apellido" name="s_apellido" class="form-control form-control-user"
						placeholder="Segundo apellido" minlength="2" required>
					<div class="invalid-feedback">
						Por favor introduzca un apellido válido.
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="email" id="correo" name="correo" class="form-control form-control-user" placeholder="Correo"
					required>
				<div class="invalid-feedback">
					Por favor introduzca un correo válido.
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-6">
					<input type="text" id="username" name="username" class="form-control form-control-user"
						placeholder="Nombre de ususario" minlength="4" required>
					<div class="invalid-feedback">
						Por favor introduzca un nombre de usuario válido.
					</div>
				</div>
				<div class="col-sm-6">
					<input type="number" id="cedula" name="cedula" class="form-control" placeholder="Cédula"
						 required>
					<div class="invalid-feedback">
						Por favor introduzca un número de cédula válido.
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="password" id="contrasena" name="contrasena" class="form-control form-control-user"
					placeholder="Contraseña"  required>
				<div class="invalid-feedback">
					La contraseña debe tener al menos 8 carateres.
				</div>
			</div>
			<div class="alert alert-danger" role="alert" id="resultado" hidden>
			</div>
			<button id="enviar" type="submit" class="btn btn-primary btn-user btn-block">
			Registrar Cuenta
			</button>
		</form>
		<hr>
		<div class="text-center">
			<a href="page-forgot.php" class="small">¿Olvido la contraseña?</a>
		</div>
		<div class="text-center">
			<a href="index.php" class="small">¿Ya tienes una cuenta? Iniciar sesión!</a>
		</div>
	</div>
</div>
<script src="js/front/form-validation.js"></script>
<script src="scripts/registro.js"></script>

