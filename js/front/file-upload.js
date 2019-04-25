(function () {

	'use strict'

	$(document).on('change', '.content-icon-camera :file', function (e) {
		var input = $(this);
		// input[0].id = id del input file (foto o notas o etc)
		var file = document.getElementById(`${input[0].id}`);
		var preload = document.getElementById('preload');
		// var publish = document.getElementById(`publish-${input_id}`); // esto es para mandar cada input individual pero recarga la pagina (tener en cuenta)
		var enviar_docs = document.getElementById('enviarDocs');
		var formData = new FormData();

		enviar_docs.addEventListener('click', function (e) {
			e.preventDefault();
			preload.classList.add('activate-preload');

			// Cuando cargues el Ajax
			fetch('./front/server.php', {
				method: 'POST',
				body: formData
			})
				.then(function (response) {
					return response.json();					
				})
				.then(function (data) {
					// Cargar estas lineas
					// sirven para decir cuantos archivos se subieron con exito
					
					preload.classList.remove('activate-preload');
					var success = document.getElementById(`success-${input[0].id}`);
					var num_files = success.dataset.upload;
					num_files = parseInt(num_files) + parseInt(data.count);
					success.dataset.upload = `${num_files}`;
					success.innerText = `Se subieron ${num_files} con exito.`;
					clearFormDataAndThumbnails();

					// Fin - Cargar estas lineas
				})
				.catch(function (err) {
					console.log(err);
				});

		});

		var createThumbnail = function (file, iterator, thumbnail_id) {
			var thumbnail = document.createElement('div');
			thumbnail.classList.add('thumbnail', thumbnail_id);
			thumbnail.dataset.id = thumbnail_id;

			thumbnail.setAttribute('style', `background-image: url(${URL.createObjectURL(file.files[iterator])})`);
			document.getElementById(`preview-images-${input[0].id}`).appendChild(thumbnail);
			createCloseButton(thumbnail_id);
		}

		var createCloseButton = function (thumbnail_id) {
			var closeButton = document.createElement('div');
			closeButton.classList.add('close-button');
			closeButton.innerText = 'x';
			document.getElementsByClassName(thumbnail_id)[0].appendChild(closeButton);
		}

		var clearFormDataAndThumbnails = function () {
			for (var key of formData.keys()) {
				formData.delete(key);
			}

			document.querySelectorAll('.thumbnail').forEach(function (thumbnail) {
				thumbnail.remove();
			});
		}

		document.body.addEventListener('click', function (e) {
			if (e.target.classList.contains('close-button')) {
				e.target.parentNode.remove();
				formData.delete(e.target.parentNode.dataset.id);
			}
		});

		var cargarImagenes = function (e, file, formData, file_id) {
			// Restricciones de Tamaño, Numero de archivos
			var size_max = 3000000;

			// Ayuda a restringir que no se creen mas de number_file_max
			// estos son los div que se van creando cuando se agrega una imagen
			// que van dentro de preview images
			var count_div = $(`#preview-images-${file_id}`).children('div').length + 1;

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
							//crea un id para pasarselao a form data y agregarselo a cada div en data-id
							// para saber cual imagen elimiar cuando se presione la 'x' (close)
							var thumbnail_id = file_id + '_' + Math.floor(Math.random() * 90000) + '_' + Date.now();
							//crea el div (preview de la imagen)
							createThumbnail(file, i, thumbnail_id);
							// agregael id con el archivo al formData
							formData.append(thumbnail_id, file.files[i]);
							// actualiza el numero de div(imagenes) creadas
							count_div = $(`#preview-images-${file_id}`).children('div').length + 1;
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

		cargarImagenes(e, file, formData, input[0].id);

	});
})();