<?php
require_once "auth.php";
require_once "connect.php";
$conexion = connect_to_db();
$folio = $_POST["folio"];
$abono = $_POST["abono"];
$abonado = $_POST["abonado"];

// echo $_POST["folio"];
$queryFolio = "SELECT * FROM process WHERE Folio = '$folio'";
$res = $conexion->query($queryFolio);
if($res->num_rows > 0){
    while ($fila = mysqli_fetch_array($res)) {
        $id_process = $fila["ID_Process"];
    }
}

$nuevoAbonado = $abonado + $abono;

$conexion->begin_transaction();
try{
    $query = "UPDATE sales_history SET abonado = '$nuevoAbonado' WHERE id_process = '$id_process'";
    $conexion->query($query);
    $conexion->commit();
    echo "<script>alert('Abono realizado con exito');history.go(-1)</script>";
}catch (Exception $e){
    $conexion->rollback();
    echo "Error en la transacción: " . $e->getMessage();
}
$conexion->close();
?>