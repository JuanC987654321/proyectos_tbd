<?php
require_once "connect.php";
$conexion = connect_to_db();

$query = "SELECT cinco, cuatro, tres, dos, una FROM service_ratings WHERE rubroCalificado = 'Servicio al cliente'";
$result = $conexion->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode([]);
}

$conexion->close();
?>