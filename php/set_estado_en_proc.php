<?php
require_once "auth.php";
require_once "connect.php";

$conexion = connect_to_db();

$folio = $_POST["folio"];
$query = "UPDATE process SET OrderStatus = \"En proceso\" WHERE Folio = '$folio'";
$conexion->query($query);echo ("<script>alert(\"Estado del servicio con numero de folio: " . $folio . " cambiado a En proceso\");history.go(-1);</script>");

$conexion->close();

?>