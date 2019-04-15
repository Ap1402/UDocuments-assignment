<!-- DataTales Example -->
<div class="col-sm-12 col-md-8 col-lg-10 mx-auto">
	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="p-4">
				<div class="text-center">
					<h1 class="h4 text-gray-900 mb-4">Documentos del alumno</h1>
				</div>
				<form id="documentosForm" method"POST" class="user needs-validation" novalidate>
					<br>

					<div class="alert alert-success" role="alert" id="exito" hidden></div>
					<br>

					

					<div id="wrapper-file">
						<br>
					<div class="text-justify">
						<h5 class="text-gray-900 mb-4"><b>Documentos necesarios</b></h5>
						<p class="text-gray-900">Foto tipo carnet</p>
						<p class="text-gray-900">Cedula</p>
						<p class="text-gray-900">Fondo negro(titulo)</p>
						<p class="text-gray-900">Notas certificadas (1er a 5to)</p>
						<p class="text-gray-900">Partida de nacimiento</p>
						<p class="text-gray-900">Resultado RUSNIES</p>
						<p class="text-gray-900">Metodo de ingreso (Aprobacion de ingreso directo, tramitacion de equivalencias o certificado de salud (Solo odontologia))</p>
					</div>
					<br>

					<!--
					Los archivos relacionados estan:
									*server.php
									*js/front/file-upload.js
				-->
						<div id="container-input">
							<div class="wrap-file">
								<div class="content-icon-camera">
									<input type="file" id="file" name="file[]" accept="image/*" max="12" class="input-file" multiple/>
									<div class="icon-camera"></div>
								</div>
								<div id="preview-images" class="preview-images">

								</div>
							</div>
							<button type="submit" id="publish" class="publish">Subir</button>
						</div>
						<div class="preload">
							<img src="img/images/preload.gif" alt="preload" />
						</div>
						<h4 id="success" class="text-center green"></h4>
						
     </div>
          
					<br>
					<div class="alert alert-danger" role="alert" id="resultado" hidden></div>
					<br>

				</form>

			</div>
		</div>
	</div>
</div>
<!-- Page level custom scripts -->
<script src="js/front/form-validation.js"></script>