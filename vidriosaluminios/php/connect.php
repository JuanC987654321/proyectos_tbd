<?php
function connect_to_db(){
    $ip = "localhost";
    $database = "vidrios_aluminios";
    $conexion=mysqli_connect($ip, "root", "", $database);
    
    if(!$conexion){
        echo ("<script>alert('Error al intentar conectar a la base de datos');</script>");

        exit;
    }
    return $conexion;
}
?>
