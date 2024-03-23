<!-- ver si sirve de algo, si no eliminar -->
<?php

$ip = "localhost";
$database = "vidrios_aluminios";
$conexion=mysqli_connect($ip, "root", "", $database);

if(!$conexion){
    echo ("error en la base de datos");
    exit;
}
?>