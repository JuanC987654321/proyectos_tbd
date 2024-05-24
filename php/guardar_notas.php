<?php

require_once "connect.php";
$conexion = connect_to_db();

function redirect($url) {
    header('Location: ' . $url);
    exit();
}

// Agregar nota
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nota"])) {
    $nota = trim($_POST["nota"]);
    $color = isset($_POST["color"]) ? $_POST["color"] : '#ffffff';
    if (empty($nota)) {
        echo "<script>alert('Por favor, ingrese una nota.');</script>";
    } else {
        $nota = $conexion->real_escape_string($nota);
        $color = $conexion->real_escape_string($color);
        $sql = "INSERT INTO notas (contenido, color) VALUES ('$nota', '$color')";
        if ($conexion->query($sql) === TRUE) {
            redirect($_SERVER['PHP_SELF']); // Redirecciona para evitar reenvío del formulario
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    }
}

// Eliminar notas seleccionadas
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_selected"])) {
    if (isset($_POST["selected_notas"])) {
        $ids = implode(",", array_map('intval', $_POST["selected_notas"]));
        $sql = "DELETE FROM notas WHERE id IN ($ids)";
        if ($conexion->query($sql) === TRUE) {
            redirect($_SERVER['PHP_SELF']); // Redirecciona para evitar reenvío del formulario
        } else {
            echo "Error: " . $conexion->error;
        }
    }
}

// Actualizar orden de notas
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_order"])) {
    $order = $_POST["order"];
    foreach ($order as $position => $id) {
        $id = intval($id);
        $position = intval($position);
        $sql = "UPDATE notas SET orden = $position WHERE id = $id";
        $conexion->query($sql);
    }
    echo "Orden actualizado";
    exit();
}

// Obtener todas las notas
$sql = "SELECT * FROM notas ORDER BY orden ASC, fecha DESC";
$result = $conexion->query($sql);
?>
