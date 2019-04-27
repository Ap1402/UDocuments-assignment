(function () {

	'use strict'

	var file = document.getElementById('file');
	var preload = document.getElementById('preload');
	var enviar_docs = document.getElementById('enviarDocs');
	var formData = new FormData();

	// ------------------------------ SELECT --------------------------------

	$("#seleccion").change(function () {

		// Limpiar preview-images y success
		clearFormDataAndThumbnails();
		$("#success").html("");

		// ------------ Funcion del select
		var num = $("#seleccion").val();
		var elemento = $("[name=file]");

		if (num != "") {
			$("input").prop('disabled', false);

			$("#enviarDocs").prop('disabled', false);

		}

		if (num == 1) {
			elemento.attr("data-id", "cedula");

			$("input").prop('multiple', false);

		}

		if (num == 2) {
			elemento.attr("data-id", "foto");

			$("input").prop('multiple', false);
		}
		if (num == 3) {
			elemento.attr("data-id", "notas");

			$("input").prop('multiple', true);

		}
		if (num == 4) {
			elemento.attr("data-id", "fondo");

			$("input").prop('multiple', false);
		}

		if (num == 5) {
			elemento.attr("data-id", "rusnies");

			$("input").prop('multiple', true);
		}

		if (num == 6) {
			elemento.attr("data-id", "partida");

			$("input").prop('multiple', false);
		}

		if (num == 7) {
			elemento.attr("data-id", "metodo");

			$("input").prop('multiple', true);
		}

		// ------------ fin Funcion del select

	})

	// ------------------------------- END SELECT ----------------------------

	enviar_docs.addEventListener('click', function (e) {
		e.preventDefault();
		preload.classList.add('activate-preload');

		fetch('./back/server.php', {
			method: 'POST',
			body: formData
		})
			.then(function (response) {
				return response.json();
			})
			.then(function (data) {
				preload.classList.remove('activate-preload');

				// sirven para decir cuantos archivos se subieron con exito	
				var success = document.getElementById(`success`);
				// Limpia formData y las imagenes
				clearFormDataAndThumbnails();
				success.innerText = data.message;
				// Fin - Cargar estas lineas
			})
			.catch(function (err) {
				console.log(err);
			});
	});

	///----------------------------------------------------------------------------------------

	var createThumbnail = function (file, iterator, thumbnail_id) {
		var thumbnail = document.createElement('div');
		var urlimg = URL.createObjectURL(file.files[iterator]);

		thumbnail.classList.add('thumbnail', thumbnail_id);
		thumbnail.dataset.id = thumbnail_id;

		thumbnail.setAttribute('style', `background-image: url(${urlimg})`);

		document.getElementById('preview-images').appendChild(thumbnail);
		createCloseButton(thumbnail_id, urlimg);
	}

	var createCloseButton = function (thumbnail_id, urlimg) {
		var closeButton = document.createElement('div');
		var close = document.createElement('b');
		var zoom = document.createElement('a');
		var zoomicon = document.createElement('i');
		var download = document.createElement('a');
		var downloadicon = document.createElement('i');

		closeButton.classList.add('close-button');

		close.innerText = 'x';

		zoom.dataset.lightbox = 'gallery';
		zoom.dataset.title = file.dataset.id;

		zoom.setAttribute('href', urlimg);
		zoomicon.classList.add('fas', 'fa-eye');
		zoom.appendChild(zoomicon);

		download.setAttribute('href', urlimg);
		downloadicon.classList.add('fas', 'fa-download');
		download.setAttribute('download', file.dataset.id + Date.now());
		download.appendChild(downloadicon);

		closeButton.appendChild(close);
		closeButton.appendChild(zoom);
		closeButton.appendChild(download);

		document.getElementsByClassName(thumbnail_id)[0].appendChild(closeButton);
	}


	var clearFormDataAndThumbnails = function () {
		document.querySelectorAll('.thumbnail').forEach(function (thumbnail) {
			formData.delete(thumbnail.dataset.id);
			thumbnail.remove();
		});
	}

	document.body.addEventListener('click', function (e) {
		if (e.target.parentNode.classList.contains('close-button')) {
			e.target.parentNode.parentNode.remove();
			formData.delete(e.target.parentNode.parentNode.dataset.id);
		}
	});

	var cargarImagenes = function (e, file, formData) {
		// Restricciones de Tamaño, Numero de archivos
		var size_max = 3000000;
		var file_id = file.dataset.id;

		// Ayuda a restringir que no se creen mas de number_file_max
		// estos son los div que se van creando cuando se agrega una imagen
		// que van dentro de preview images
		var count_div = $(`#preview-images`).children('div').length + 1;

		if (file.multiple) {
			var number_file_max = 6;
		} else {
			var number_file_max = 2;
		};

		// Limita Numero de archivos que se seleccionen
		if (file.files.length < number_file_max) {

			for (var i = 0; i < file.files.length; i++) {

				if (count_div < number_file_max) {
					if (file.files[i].size < size_max) {
						//crea un id para pasarselo a formData y agregarselo a cada div en data-id
						// para saber cual imagen eliminar cuando se presione la 'x' (close)
						var thumbnail_id = file_id + '_' + (count_div - 1) + Date.now();
						//crea el div (preview de la imagen)
						createThumbnail(file, i, thumbnail_id);

						// console.log(thumbnail_id);
						// console.log(file.files[i]);

						// agregael id con el archivo al formData	
						// id de formData debe ser igual a thumbnail_id
						formData.append(thumbnail_id, file.files[i]);

						// actualiza el numero de div(imagenes) creadas
						count_div = $(`#preview-images`).children('div').length + 1;
					} else {
						alert('El archivo ' + (file.files[i].name) + ' excede el tamaño maximo (3Mb).');
					};
				} else {
					alert('La cantida de archivos excede el numero maximo permitidos.');
					break
				};

			};

		} else {
			alert('La cantida de archivos excede el numero maximo permitidos.');
		};

		e.target.value = '';
	};

	file.addEventListener('change', function (e) {
		// Actualizo el file por si cambie de opcion en el select
		file = document.getElementById('file');
		cargarImagenes(e, file, formData);
	});

})();