<?php

require_once "gen_folio.php";
require_once "connect.php";
$conexion = connect_to_db();


create_new_process();
$conexion->close();

//1
function select_or_insert_client(){
    global $conexion;
    $nombre = $_POST["nombre_cliente"];
    $numero = $_POST["numero_cliente"];

    $query = "SELECT * FROM client WHERE id_client = '$numero'";
    $res = $conexion->query($query);

    if ($res->num_rows > 0){
        while ($fila = mysqli_fetch_array($res)) {
            $nombre_cliente_bd = $fila["nombre"];
        }
        return [$numero, $nombre_cliente_bd];
    }else{
        $query = "INSERT INTO client (id_client, nombre) VALUES ('$numero', '$nombre')";
        $conexion->query($query);
        return [mysqli_insert_id($conexion), $nombre];
    }
}


function insert_sales_history($id_process){
    global $conexion;
    $precio = $_POST["precio"];
    $abono = $_POST["abono"];

    $query = "INSERT INTO sales_history (precio_total, abonado, id_process) VALUES ('$precio', '$abono', '$id_process')";
    $res = $conexion->query($query);
    return [$precio, $abono];
}


//3
function insert_process($id_client){
    global $conexion;
    $folio = get_folio();
    $fecha = $_POST["fecha"];
    $status = "En proceso";

    $query = "INSERT INTO process (Folio, OrderStatus, Id_client)
    VALUES ('$folio', '$status', '$id_client')";
    
    $conexion->query($query);
    return [mysqli_insert_id($conexion), $folio];
}


function create_new_process(){
    $client_info = select_or_insert_client();
    $process_info = insert_process($client_info[0]);
    $precio_abono = insert_sales_history($process_info[0]);
    echo "<script>
        alert('Orden creada con éxito\\n" .
        "Nombre del cliente: " . $client_info[1] . "\\n" .
        "Folio: " . $process_info[1] . "\\n" .
        "Precio: $" . $precio_abono[0] . "\\n" .
        "Abono: $" . $precio_abono[1] . "');
        history.go(-1);
    </script>";
}

?>