<div id="prueba">
    <div class="col-sm-12 col-lg-10 mx-auto">
        <div class="card shadow mb-4 border-bottom-primary">
            <div class="card-body">

                <form action="index.php" onsubmit="return buscar()" class="mx-auto my-2 my-md-0 col-sm-12 col-md-6">
                    <div class="input-group">
                        <input type="text" id="q" name="q" onKeyUp="return buscar()" class="form-control bg-light border-0 small" placeholder="Buscar alumno" aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button type="submit" value="Buscar" id="boton" class="btn btn-primary">
                                <i class="fas fa-search fa-sm"></i>
                            </button>                            
                        </div>
                    </div>
                    <span id="loading"></span>
                </form>


                SELECT
                *
                FROM
                documentos d1
                INNER JOIN
                notas n ON d1.id_documento = n.documento
                INNER JOIN
                metodoing m ON d1.id_documento =m.documento
                INNER JOIN
                rusnies r ON d1.id_documento = r.documento;

                SELECT
                *
                FROM
                documentos d1
                INNER JOIN
                notas n ON d1.id_documento = n.documento
                INNER JOIN
                metodoing m ON d1.id_documento =m.documento
                INNER JOIN
                rusnies r ON d1.id_documento = r.documento
                WHERE id_documento='0';




            </div>

        </div>

    </div>

</div>