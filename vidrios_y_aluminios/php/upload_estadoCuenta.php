<?php
require_once "connect.php";
$conexion = connect_to_db();

$PATH_EstadoCuenta = '../files/EstadosCuenta/';
$folio = $_POST["folio"];


$conexion->begin_transaction();
try{
    $nombreEstadoCuenta = $_FILES['SoA']['name'];
    $ruta_nuevo_estado_cuenta = $PATH_EstadoCuenta . $folio . ".pdf";

    if (!is_dir($PATH_EstadoCuenta)) {
        mkdir($PATH_EstadoCuenta, 0777, true);
    }

    if ((move_uploaded_file($_FILES['SoA']['tmp_name'], $ruta_nuevo_estado_cuenta))) {
        $query = "UPDATE registration SET Statement_of_account = '$ruta_nuevo_estado_cuenta'";
        $conexion->query($query);
    }
    else {
        echo "Error al mover el archivo subido.";
    }
}catch (Exception $e){
    $conexion->rollback();
}