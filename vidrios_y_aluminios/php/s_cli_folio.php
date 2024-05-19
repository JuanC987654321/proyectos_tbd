<?php

//este buscar es para los clientes

require_once 'connect.php';
$conexion = connect_to_db();
buscar($conexion);

function buscar($conexion){
    $search_field = $_POST["search_field"];
    $busqueda_query = "SELECT * FROM process WHERE Folio LIKE '$search_field'";


    $res_busqueda = $conexion->query($busqueda_query);

    if($res_busqueda->num_rows > 0){
        while ($filaBuy = mysqli_fetch_array($res_busqueda)) {
            //busca la informacion en la base de datos
            $folio = $filaBuy["Folio"];
            $orderStatus = $filaBuy["OrderStatus"];

            
            $id_customer = $filaBuy["id_client"];
            $cust_query = "SELECT * FROM client WHERE id_client LIKE '$id_customer'";
            $res_customer = $conexion->query($cust_query);

            if($res_customer->num_rows > 0){
                while($filaCust = mysqli_fetch_array($res_customer)){

                    //attention cambiar esto por las columnas de la tabla client
                    $nombre = $filaCust["nombre"];
                }
            }


            //guarda esa informacion en cookies
            setcookie("folio", $folio, time() + 3600, "/");
            setcookie("OrderStatus", $orderStatus, time() + 3600, "/");
            setcookie("nombre", $nombre, time() +3600, "/");
            //setcookie("price", $price, time() + 3600, "/");
            //setcookie("advance_payment", $advance_payment, time() + 3600, "/");

            //envia a la pagina donde se mostrara esta informacion
            header("location:../tracking.php");
        }
    }else{
        echo "<script>alert('Folio no encontrado');history.go(-1);</script>";
    }
    $conexion->close();
}

?>