<?php

require_once "connect.php";

function buscar_por_status($status){
    $conexion = connect_to_db();
    $r = array();

    $query = "SELECT * FROM buy WHERE status LIKE '$status'";
    $res_busqueda = $conexion->query($query);

    if($res_busqueda->num_rows > 0){
        while ($fila_busqueda = mysqli_fetch_array($res_busqueda)) {
            echo ("<li>". $fila_busqueda["Folio"] ."</li>");
        }
    }
    $conexion->close();
    return $r;
}

?>