<?php

require_once "connect.php";

// Obtener las notas enviadas desde la solicitud AJAX
$data = json_decode(file_get_contents('php://input'), true);

$conexion = connect_to_db();

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión a la base de datos: " . $conexion->connect_error);
}

// Eliminar todas las notas existentes en la base de datos
$conexion->query("DELETE FROM notas");

// Insertar las nuevas notas en la base de datos
foreach ($data as $nota) {
    $nota = $conexion->real_escape_string($nota);
    $conexion->query("INSERT INTO notas (texto) VALUES ('$nota')");
}

// Cerrar la conexión
$conexion->close();

// Responder con un código de éxito
http_response_code(200);
?>
