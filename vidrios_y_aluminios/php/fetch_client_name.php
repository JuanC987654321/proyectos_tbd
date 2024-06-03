<?php
require_once "connect.php";
$conexion = connect_to_db();

if (isset($_POST['numero_cliente'])) {
    $numeroCliente = $_POST['numero_cliente'];
    $sql = "SELECT nombre FROM client WHERE id_client = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $numeroCliente);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(['nombre' => $row['nombre']]);
    } else {
        echo json_encode(['nombre' => '']);
    }

    $stmt->close();
}

$conexion->close();
?>