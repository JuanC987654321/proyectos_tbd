<?php

require_once "gen_folio.php";
require_once "connect.php";

//directorio donde se van a subir las imagenes de los servicios
$PATH_EstadoCuenta = '../files/EstadosCuenta/';
$PATH_Cotizacion = '../files/Cotizaciones/';

$conexion = connect_to_db();


// mysqli_begin_transaction($conexion);    
$conexion->begin_transaction();
try{
    create_new_process();
    $conexion->commit();
}catch (Exception $e){
    $conexion->rollback();
    echo "Error en la transacción: " . $e->getMessage();
}
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



//2
function insert_process($id_client){
    global $conexion;
    $folio = get_folio();
    $status = "En proceso";

    $query = "INSERT INTO process (Folio, OrderStatus, Id_client)
    VALUES ('$folio', '$status', '$id_client')";
    
    $conexion->query($query);
    return [mysqli_insert_id($conexion), $folio];
}


//3
function insert_sales_history($id_process){
    global $conexion;
    $precio = $_POST["precio"];
    $abono = $_POST["abono"];

    $query = "INSERT INTO sales_history (precio_total, abonado, id_process) VALUES ('$precio', '$abono', '$id_process')";
    $res = $conexion->query($query);
    return [mysqli_insert_id($conexion), $precio, $abono];
}


//4
function insert_registration($id_client, $id_process, $id_SH, $folio){
    global $conexion;
    global $PATH_EstadoCuenta;
    global $PATH_Cotizacion;

    $fecha_hora_actual = date("Y-m-d H:i:s");

    
    // $nombreEstadoCuenta = $_FILES['SoA']['name'];
    $nombreCotiz = $_FILES['cotiz']['name'];
    // $ruta_nuevo_estado_cuenta = $PATH_EstadoCuenta . $folio . ".pdf";
    $ruta_nueva_cotizacion = $PATH_Cotizacion . $folio . ".pdf";

    // Asegurarse de que el directorio de subida existe
    // if (!is_dir($PATH_EstadoCuenta)) {
    //     mkdir($PATH_EstadoCuenta, 0777, true);
    // }
    if (!is_dir($PATH_Cotizacion)) {
        mkdir($PATH_Cotizacion, 0777, true);
    }

    // Mover el archivo subido al directorio de destino
    // if ((move_uploaded_file($_FILES['SoA']['tmp_name'], $ruta_nuevo_estado_cuenta)) && move_uploaded_file($_FILES['cotiz']['tmp_name'], $ruta_nueva_cotizacion)) {
    if (move_uploaded_file($_FILES['cotiz']['tmp_name'], $ruta_nueva_cotizacion)) {
        $query = "INSERT INTO registration (Id_client, Id_process, Id_SH, Date_of_purchase, Photo, Quotation) 
        VALUES ('$id_client', '$id_process', '$id_SH', '$fecha_hora_actual', 'N/APhoto', '$ruta_nueva_cotizacion')";
        $res = $conexion->query($query);
    }    
    else {
        echo "Error al mover el archivo subido.";
    }

}

function create_new_process(){
    $client_info = select_or_insert_client();
    $process_info = insert_process($client_info[0]);
    $sh_info = insert_sales_history($process_info[0]);
    insert_registration($client_info[0], $process_info[0], $sh_info[0], $process_info[1]);
    echo "<script>
        alert('Orden creada con éxito\\n" .
        "Nombre del cliente: " . $client_info[1] . "\\n" .
        "Folio: " . $process_info[1] . "\\n" .
        "Precio: $" . $sh_info[1] . "\\n" .
        "Abono: $" . $sh_info[2] . "');
        history.go(-1);
    </script>";
    // echo "<script>
    //     alert('Orden creada con éxito\\n" .
    //     "Nombre del cliente: " . $client_info[1] . "\\n" .
    //     "Folio: " . $process_info[1] . "\\n" .
    //     "Precio: $" . $sh_info[1] . "\\n" .
    //     "Abono: $" . $sh_info[2] . "');
    // </script>";
}

?>