<?php
require_once "connect.php";
$conexion = connect_to_db();

calificar();

function calificar(){
    global $conexion;
    $rating = $_POST["rating"];
    $folio = $_POST["folio"];

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
            echo "Calificación inválida ?¿";
            return;
    }

    //warning esto cambiara cuando se actualize la base de datos, debe guardar en el
    //warning proceso seleccionado

    $query = "UPDATE process SET Ranking =$rating WHERE Folio = '$folio'";




    //attention este es el bueno, si algo falla volver a este
    // $query = "INSERT INTO service_ratings (id_serv, $column)
    //     VALUES (1, 1)
    //     ON DUPLICATE KEY UPDATE $column = $column + 1;";

    $conexion->query($query);
    $conexion->close();
    // echo "<script>alert('Calificacion enviada con exito');history.go(-1);</script>";

}
?>