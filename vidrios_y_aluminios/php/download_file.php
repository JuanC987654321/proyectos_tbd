<?php
require_once "connect.php";

$conexion = connect_to_db();
$column = $_GET["column"];
$id = $_GET["ID_Process"];
$query = "SELECT $column FROM registration WHERE Id_process = $id";
$res = $conexion->query($query);
if($res->num_rows > 0){
    while ($f = mysqli_fetch_assoc($res)) {
        $ruta = $f[$column];
    }
}

if (file_exists($ruta)) {
    // Forzar la descarga del archivo
    header('Content-Description: File Transfer');
    // header('Content-Type: .pdf' . $tipo);
    header('Content-Disposition: attachment; filename="' . basename($ruta) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($ruta));
    readfile($ruta);
    exit;
} else {
    echo "El archivo no existe.";
}

?>