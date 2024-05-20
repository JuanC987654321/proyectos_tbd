<?php
require_once "connect.php";
$conexion = connect_to_db();

calificar();

function calificar(){
    global $conexion;
    $rating = $_POST["rating"];

    $column = "";
    switch ($rating) {
        case 1:
            $column = "una";
            break;
        case 2:
            $column = "dos";
            break;
        case 3:
            $column = "tres";
            break;
        case 4:
            $column = "cuatro";
            break;
        case 5:
            $column = "cinco";
            break;
        default:
            echo "Calificación inválida";
            return;
    }

    $query = "INSERT INTO service_ratings (id_serv, $column)
        VALUES (1, 1)
        ON DUPLICATE KEY UPDATE $column = $column + 1;";

    $conexion->query($query);
    $conexion->close();
    echo "<script>alert('Calificacion enviada con exito');history.go(-1);</script>";

    // echo ($_POST["rating"]);
}
?>