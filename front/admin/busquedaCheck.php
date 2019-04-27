<div id="prueba">
    <div class="col-sm-12 col-lg-10 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-body">

                <form action="index.php" onsubmit="return buscar()">
                    <label>Buscar</label> <input type="text" id="q" name="q" onKeyUp="return buscar()">
                    <input type="submit" value="Buscar" id="boton">
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