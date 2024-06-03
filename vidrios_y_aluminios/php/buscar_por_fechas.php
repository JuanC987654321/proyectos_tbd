<?php
require_once "connect.php";
$conexion = connect_to_db();

// Verifica si las fechas han sido enviadas
if (isset($_GET['param']) && isset($_GET['param2'])) {
    $fecha_inicio = $_GET['param'];
    $fecha_final = $_GET['param2'];

    // Valida que las fechas no estén vacías
    if (!empty($fecha_inicio) && !empty($fecha_final)) {
        // Prepara la consulta SQL
        $sql = "
            SELECT r.Id_process, r.Date_of_purchase, p.OrderStatus 
            FROM registration r
            JOIN process p ON r.Id_process = p.Id_process
            WHERE r.Date_of_purchase BETWEEN ? AND ?
        ";

        // Prepara la declaración
        $stmt = $conexion->prepare($sql);

        // Asigna los parámetros
        $stmt->bind_param("ss", $fecha_inicio, $fecha_final);

        // Ejecuta la consulta
        $stmt->execute();

        // Obtén el resultado
        $resultado = $stmt->get_result();

        // Verifica si hay resultados
        if ($resultado->num_rows > 0) {
            // Muestra los resultados
            while ($fila = $resultado->fetch_assoc()) {
                echo "Id_process: " . $fila['Id_process'] . " - Date_of_purchase: " . $fila['Date_of_purchase'] . " - OrderStatus: " . $fila['OrderStatus'] . "<br>";
            }
        } else {
            echo "No se encontraron resultados para el rango de fechas especificado.";
        }

        // Cierra la declaración
        $stmt->close();
    } else {
        echo "Por favor, seleccione un rango de fechas válido.";
    }
} else {
    echo "Por favor, seleccione un rango de fechas.";
}

// Cierra la conexión
$conexion->close();
?>
