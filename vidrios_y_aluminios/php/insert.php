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

//2
// function insert_product(){
//     global $conexion;
//     $material = $_POST["material"];
//     $color = $_POST["color"];
//     $type = $_POST["type"];
//     $description = $_POST["description"];
//     $length = $_POST["length"];
//     $width = $_POST["width"];

//     $query = "INSERT INTO product (Material, Color, Type, Description, Length, Width)
//     VALUES ('$material', '$color', '$type', '$description', '$length', '$width')";

//     $conexion->query($query);
//     return mysqli_insert_id($conexion);
// }


//3
function insert_process($id_client){
    global $conexion;
    // $folio = $_POST["folio"];
    //el folio se debe generar automaticamente, ya hay un archivo php que medio hace eso
    //solo necesito saber cuantos ya han sido generados
    $folio = get_folio();
    $fecha = $_POST["fecha"];
    $status = "En proceso";

    $query = "INSERT INTO process (Folio, OrderStatus, Id_client)
    VALUES ('$folio', '$status', '$id_client')";

    // $query2 = "INSERT INTO "
    
    $conexion->query($query);
    return $folio;
}

//4
// function insert_price_quote($id_customer, $id_product, $id_staff){
//     session_start();
    
//     global $conexion;
//     $quoation_date = date("Y-m-d");
//     $price = $_POST["price"];
//     $id_staff = $_SESSION["id_staff"];

//     $query = "INSERT INTO price_quote (Quotation_date, Price, Id_customer, Id_product, Id_staff)
//     VALUES ('$quoation_date', '$price', '$id_customer', '$id_product', '$id_staff')";
    
//     $conexion->query($query);
// }


//main
// function insert_all_tables(){
//     $new_product_id = insert_product();
//     $new_customer_id = insert_customer();
//     insert_buy($new_product_id, $new_customer_id);
//     insert_price_quote($new_customer_id, $new_product_id, $_SESSION["id_staff"]);
//     echo ("<script>alert('Orden creada con exito :D');window.location='../main.php';</script>");
// }


function create_new_process(){
    $client_info = select_or_insert_client();
    $folio_creado = insert_process($client_info[0]);
    echo ("<script>alert('Orden creada con exito :D\\nNombre del cliente: " . $client_info[1] . "\\nFolio: " . $folio_creado . "');history.go(-1);</script>");
}

?>