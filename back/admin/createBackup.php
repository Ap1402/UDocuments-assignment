<?php
include '../conexion.php';

session_start();

$usuario = filter_var($_SESSION['username'], FILTER_SANITIZE_STRING);
$contrasena = filter_var($_POST['contrasena'], FILTER_SANITIZE_STRING);

$consulta = "SELECT administradores.*, rol_admin.respaldo_bd
            FROM administradores LEFT JOIN rol_admin ON rol_admin.id = administradores.rol
                WHERE administradores.usuario ='$usuario'";

$resultado = mysqli_query($conexion, $consulta);
$datos = mysqli_fetch_array($resultado);

$userBD = $datos['usuario'];
$passwordBD = $datos['contrasena'];

if (!($usuario == $userBD and password_verify($contrasena, $passwordBD) and $datos['respaldo_bd'] == 1)) {
    return print_r(json_encode([
        'message' => 'La contraseña no es correcta o no tiene los privilegios para realizar esta accion'
    ]));
}

//Example Usage/s
$backup = new BackupMyProject('../documentos', true);





/*o
Then your have the object properties to determine the backup

$backup = BackupMyProject Object
(
    [project_path] => ./path/to/project/yada
    [backup_file] => ./project_backups/yada.zip
)

Alternatively set the second parameter and just send the project as a download.
BackupMyProject('./path/to/project/yada', true);
*/


/**
 * Zip a directory into a backups folder, 
 *  optional send the zip as a download
 * 
 * @author Lawrence Cherone
 * @version 0.1
 */
class BackupMyProject
{
    // project files working directory - automatically created
    const PWD = "./";

    /**
     * Class construct.
     *
     * @param string $path
     * @param bool $download
     */
    function __construct($path = null, $download = false)
    {
        // check construct argument
        if (!$path) die(__CLASS__ . ' Error: Missing construct param: $path');
        if (!file_exists($path)) die(__CLASS__ . ' Error: Path not found: ' . htmlentities($path));
        if (!is_readable($path)) die(__CLASS__ . ' Error: Path not readable: ' . htmlentities($path));

        $filename = 'RespaldoBD_' . date('h-d-m-y') . '.sql';
        $result = exec('C:\xampp\mysql\bin\mysqldump --user=admin --password=admin --host=localhost controlest > C:\xampp\htdocs\controlest\back\documentos\BackupDB\\' . $filename);

        // set working vars
        $this->project_path = rtrim($path, '/');
        $this->backup_file  = self::PWD . basename($this->project_path) . '.zip';

        // make project backup folder
        if (!file_exists(self::PWD)) {
            mkdir(self::PWD, 0775, true);
        }

        // zip project files
        try {
            $this->zipcreate($this->project_path, $this->backup_file);
        } catch (Exception $e) {
            die($e->getMessage());
        }

        if ($download !== false) {
            // send zip to user
            header('Content-Description: File Transfer');
            header('Content-Type: application/zip');
            header('Content-Disposition: attachment; filename="' . basename($this->backup_file) . '"');
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . sprintf("%u", filesize($this->backup_file)));
            readfile($this->backup_file);
            // cleanup
            unlink($this->backup_file);
        }
    }

    /**
     * Create zip from extracted/fixed project.
     *
     * @uses ZipArchive
     * @uses RecursiveIteratorIterator
     * @param string $source
     * @param string $destination
     * @return bool
     */
    function zipcreate($source, $destination)
    {
        if (!extension_loaded('zip') || !file_exists($source)) {
            throw new Exception(__CLASS__ . ' Fatal error: ZipArchive required to use BackupMyProject class');
        }
        $zip = new ZipArchive();
        if (!$zip->open($destination, ZIPARCHIVE::CREATE)) {
            throw new Exception(__CLASS__ . ' Error: ZipArchive::open() failed to open path');
        }
        $source = str_replace('\\', '/', realpath($source));
        if (is_dir($source) === true) {
            $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);
            foreach ($files as $file) {
                $file = str_replace('\\', '/', realpath($file));
                if (is_dir($file) === true) {
                    $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
                } else if (is_file($file) === true) {
                    $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
                }
            }
        }
        return $zip->close();
    }
}
