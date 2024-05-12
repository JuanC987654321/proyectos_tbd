<?php

require_once "connect.php";
if(isset($_GET['accion']) && function_exists($_GET['accion'])) {
    $accion = $_GET['accion'];
    $accion($_GET["status"]); // Llamar a la función
}
function buscar_por_status($status){
    echo "<script>window.location='../procesos.php?status=" . $status . "';</script>";
}

?>