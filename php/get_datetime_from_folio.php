<?php



function convertirFechaHora($fechaHora) {
    setlocale(LC_TIME, 'es_ES.UTF-8', 'Spanish_Spain', 'Spanish');
    // Extraer la fecha y la hora
    $fecha = substr($fechaHora, 6, 6); // yymmdd
    $horaminuto = substr($fechaHora, 13, 6); // hhmmss

    // Convertir la fecha al formato adecuado
    $dia = substr($fecha, 0, 2);
    $mes = substr($fecha, 2, 2);
    $anio = '20' . substr($fecha, 4, 2); // yy -> 20yy

    // Crear una marca de tiempo para obtener el mes en letras
    $timestamp = mktime(0, 0, 0, $mes, $dia, $anio);
    $mesEnLetras = strftime('%B', $timestamp); // Mes en letras

    // Convertir la hora al formato adecuado
    $hora = substr($horaminuto, 0, 2); // hh
    $minuto = substr($horaminuto, 2, 2); // mm

    // Formatear la fecha y la hora
    $fechaFormateada = sprintf("%02d de %s de %04d, %02d:%02d", $dia, $mesEnLetras, $anio, $hora, $minuto);

    return $fechaFormateada;
}

// Ejemplo de uso
// $fechaHora = '00005-200324-082540';
// echo convertirFechaHora($fechaHora);
?>
