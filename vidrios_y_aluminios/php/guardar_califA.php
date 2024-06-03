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

    $query = "UPDATE process SET RankingA = $rating WHERE Folio = '$folio'";




    $conexion->query($query);
    $conexion->close();
    // echo "<script>alert('Calificacion enviada con exito');history.go(-1);</script>";

}
?>