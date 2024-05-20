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
            $column = "1star";
            break;
        case 2:
            $column = "2star";
            break;
        case 3:
            $column = "3star";
            break;
        case 4:
            $column = "4star";
            break;
        case 5:
            $column = "5star";
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
    echo "<script>alert('Calificacion enviada con exito');window.location='index.php';</script>";

    // echo ($_POST["rating"]);
}
?>