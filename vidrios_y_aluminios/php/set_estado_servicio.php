<?php
require_once "auth.php";
require_once "connect.php";

$conexion = connect_to_db();
$folio = $_POST["folio"];
$nuevoEstado = $_POST["status"];



$conexion->begin_transaction();
try{
    $query = "UPDATE process SET OrderStatus = '$nuevoEstado' WHERE Folio = '$folio'";
    $conexion->query($query);
    $conexion->commit();
    echo ("<script>alert(\"Estado del servicio con numero de folio: " . $folio . " cambiado a " . "$nuevoEstado" . "\");history.go(-1);</script>");
}catch (Exception $e){
    $conexion->rollback();
    echo "Error en la transacción: " . $e->getMessage();
}
$conexion->close();

?>