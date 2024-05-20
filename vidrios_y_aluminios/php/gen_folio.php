<?php

// echo "Today is " . date("Y/m/d") . "<br>";
// echo "Today is " . date("Y.m.d") . "<br>";
// echo "Today is " . date("Y-m-d") . "<br>";
// echo "en el folio ira '" . date("00006-dmy-His") . "'";
// echo "Today is " . date("l");
date_default_timezone_set('America/Mexico_City');


require_once "connect.php";
$conexion = connect_to_db();

function get_folio(){
    global $conexion;
    // Obtener el último folio
    $query = "SELECT Folio FROM process ORDER BY ID_Process DESC LIMIT 1";
    $result = mysqli_query($conexion, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $lastFolio = $row['Folio'];
        
        // Extraer fecha del último folio
        $lastFolioDate = substr($lastFolio, 6, 6);
        // Extraer contador del último folio
        $lastCounter = (int)substr($lastFolio, 0, 5);

        // Fecha actual en formato ddmmaa
        $currentDate = date('dmy');

        if ($lastFolioDate === $currentDate) {
            // Mismo día, incrementar contador
            $newCounter = str_pad($lastCounter + 1, 5, '0', STR_PAD_LEFT);
        } else {
            // Nuevo día, reiniciar contador
            $newCounter = '00001';
        }

        // Generar nuevo folio con la fecha y hora actual
        $newFolio = $newCounter . '-' . $currentDate . '-' . date('His');
        echo "Nuevo folio generado: " . $newFolio;

    } else {
        // Si no hay registros, empezar con el primer folio
        $newFolio = '00001-' . date('dmy') . '-' . date('His');
        echo "Primer folio generado: " . $newFolio;
    }
    return $newFolio;
}
?>