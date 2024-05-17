<?php

//este buscar es para los clientes

require_once 'connect.php';
$conexion = connect_to_db();
buscar($conexion);

function buscar($conexion){
    $search_field = $_POST["search_field"];


    //dejo esto porque aun no sabemos como estara formateado el folio o como podran
    //buscar la informacion de sus pedidos los clientes
    //si se ingresa una folio en el cuadro, dependiendo de como sean los folios se 
    //pueden añadir comprobaciones extra como la longitud de los caracteres y asi
    if (substr($search_field, 0 , 4) == "FOL-"){
        // echo "<script>alert('" . substr($search_field, 0 , 4) . "');</script>";
        $busqueda_query = "SELECT * FROM buy WHERE folio LIKE '$search_field'";
    //si se ingresa un nombre
    }else{

    }

    $res_busqueda = $conexion->query($busqueda_query);

    if($res_busqueda->num_rows > 0){
        while ($filaBuy = mysqli_fetch_array($res_busqueda)) {
            //busca la informacion en la base de datos
            $folio = $filaBuy["Folio"];
            $status = $filaBuy["Status"];
            //$price = $filaBuy["Price"];
            //$advance_payment = $filaBuy["Advance_payment"];

            //$id_product = $filaBuy["Id_product"];
            //$prod_query = "SELECT * FROM product WHERE ID_Product LIKE '$id_product'";
            //$res_prod = $conexion->query($prod_query);
            
            
            // if($res_prod->num_rows > 0){
            //     while ($filaProd = mysqli_fetch_array($res_prod)) {
            //         $material = $filaProd["Material"];
            //         $color = $filaProd["Color"];
            //         $type = $filaProd["Type"];
            //         $description = $filaProd["Description"];
            //         $length = $filaProd["Length"];
            //         $width = $filaProd["Width"];
            //     }
            // }
            
            $id_customer = $filaBuy["Id_customer"];
            $cust_query = "SELECT * FROM customer WHERE ID_Customer LIKE '$id_customer'";
            $res_customer = $conexion->query($cust_query);

            if($res_customer->num_rows > 0){
                while($filaCust = mysqli_fetch_array($res_customer)){
                    $name = $filaCust["Name"];
                    $last_name = $filaCust["Last_name"];
                    $fullname = $name . " " . $last_name;
                }
            }


            //guarda esa informacion en cookies
            setcookie("folio", $folio, time() + 3600, "/");
            setcookie("status", $status, time() + 3600, "/");
            //setcookie("price", $price, time() + 3600, "/");
            //setcookie("advance_payment", $advance_payment, time() + 3600, "/");

            
            // setcookie("material", $material, time() + 3600, "/");
            // setcookie("color", $color, time() + 3600, "/");
            // setcookie("type", $type, time() + 3600, "/");
            // setcookie("description", $description, time() + 3600, "/");
            // setcookie("length", $length, time() + 3600, "/");
            // setcookie("width", $width, time() + 3600, "/");

            setcookie("fullname", $fullname, time() + 3600, "/");

            //envia a la pagina donde se mostrara esta informacion
            header("location:../tracking.php");
        }
    }else{
        echo "<script>alert('Folio no encontrado');history.go(-1);</script>";
    }
    $conexion->close();
}

?>