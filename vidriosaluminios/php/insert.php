<?php


require_once "connect.php";
$conexion = connect_to_db();


insert_all_tables();
$conexion->close();

//1
function insert_customer(){
    global $conexion;
    $name = $_POST["name"];
    $last_name = $_POST["last_name"];
    $telephone_number = $_POST["telephone_number"];
    $address = $_POST["address"];
    $email = $_POST["email"];

    $query = "INSERT INTO customer (Name, Last_name, Telephone_number, Address, Email)
    VALUE ('$name', '$last_name', '$telephone_number', '$address', '$email')";
    
    $conexion->query($query);
    return mysqli_insert_id($conexion);
}

//2
function insert_product(){
    global $conexion;
    $material = $_POST["material"];
    $color = $_POST["color"];
    $type = $_POST["type"];
    $description = $_POST["description"];
    $length = $_POST["length"];
    $width = $_POST["width"];

    $query = "INSERT INTO product (Material, Color, Type, Description, Length, Width)
    VALUES ('$material', '$color', '$type', '$description', '$length', '$width')";

    $conexion->query($query);
    return mysqli_insert_id($conexion);
}


//3
function insert_buy($id_product, $id_customer){
    global $conexion;

    //de momento folio es ingresado por el administrador pero 
    //seria mejor generarlo algoritmicamente, status igual quiza
    //cambie en el futuro la manera de asignarlo
    $folio = $_POST["folio"];
    $status = "Pending";
    $price = $_POST["price"];
    $anticipo = $_POST["advance_payment"];

    $query = "INSERT INTO buy (Folio, Status, Price, Advance_payment, Id_product, Id_customer)
    VALUES ('$folio', '$status', '$price', '$anticipo', '$id_product', '$id_customer')";
    
    $conexion->query($query);
}

//4
function insert_price_quote($id_customer, $id_product, $id_staff){
    session_start();
    
    global $conexion;
    $quoation_date = date("Y-m-d");
    $price = $_POST["price"];
    $id_staff = $_SESSION["id_staff"];

    $query = "INSERT INTO price_quote (Quotation_date, Price, Id_customer, Id_product, Id_staff)
    VALUES ('$quoation_date', '$price', '$id_customer', '$id_product', '$id_staff')";
    
    $conexion->query($query);
}


//main
function insert_all_tables(){
    $new_product_id = insert_product();
    $new_customer_id = insert_customer();
    insert_buy($new_product_id, $new_customer_id);
    insert_price_quote($new_customer_id, $new_product_id, $_SESSION["id_staff"]);
    echo ("<script>alert('Orden creada con exito :D');window.location='../main.php';</script>");

}

?>