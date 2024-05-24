<?php

require_once "connect.php";
if(isset($_GET['accion']) && function_exists($_GET['accion'])) {
    $accion = $_GET['accion'];
    $param = $_GET["param"];
    $accion($param); // Llamar a la función
}
function buscar_por_status($param){
    echo "<script>window.location='../servicios.php?status=" . $param . "';</script>";
}

function buscar_por_folio_o_nombre($param){
    $pattern = '/^\d{5}-\d{6}-\d{6}$/';
    
    // Validar el folio con la expresión regular
    if (preg_match($pattern, $param)) {
        echo "<script>window.location='../servicios.php?folio=" . $param . "';</script>";
    } else {
        echo "<script>window.location='../servicios.php?nombre=" . $param . "';</script>";
    }


    // cuando los primeros 5 lleguen al tope que se reinicien
    // de todas maneras los segundos 6 nunca se van a volver a repetir
    // e incluso si eso pasa los terceros 6 son una capa extra de seguridad

    // conta-DDMMAA-HHMMSS
    // 00001-150524-122512
    // 99999-150524-122512

    // echo "<script>window.location='../servicios.php?search_param=" . $param . "';</script>";
}

?>