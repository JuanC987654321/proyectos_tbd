<?php

$ip = "localhost";
$database = "vidrios_aluminios";
$conexion=mysqli_connect($ip, "root", "", $database);

if(!$conexion){
    echo ("error en la base de datos");
    exit;
}


buscar($conexion);

function buscar($conexion){
    $folio = $_POST["folio"];

    $busqueda_query = "SELECT * FROM buy WHERE folio LIKE '$folio'";
    $res_busqueda = $conexion->query($busqueda_query);

    if($res_busqueda->num_rows > 0){
        while ($filaBuy = mysqli_fetch_array($res_busqueda)) {
            //busca la informacion en la base de datos
            $folio = $filaBuy["Folio"];
            $status = $filaBuy["Status"];
            $price = $filaBuy["Price"];
            $advance_payment = $filaBuy["Advance_payment"];

            $id_product = $filaBuy["Id_product"];
            $prod_query = "SELECT * FROM product WHERE ID_Product LIKE '$id_product'";
            $res_prod = $conexion->query($prod_query);
            // Falta buscar la informacion en $filaBuy["Id_product"]
            // Material
            // Color
            // Type
            // Description
            // Length
            // Width
            if($res_prod->num_rows > 0){
                while ($filaProd = mysqli_fetch_array($res_prod)) {
                    $material = $filaProd["Material"];
                    $color = $filaProd["Color"];
                    $type = $filaProd["Type"];
                    $description = $filaProd["Description"];
                    $length = $filaProd["Length"];
                    $width = $filaProd["Width"];
                }
            }


            //guarda esa informacion en cookies
            setcookie("folio", $folio, time() + 300, "/");
            setcookie("status", $status, time() + 300, "/");
            setcookie("price", $price, time() + 300, "/");
            setcookie("advance_payment", $advance_payment, time() + 300, "/");

            
            setcookie("material", $material, time() + 300, "/");
            setcookie("color", $color, time() + 300, "/");
            setcookie("type", $type, time() + 300, "/");
            setcookie("description", $description, time() + 300, "/");
            setcookie("length", $length, time() + 300, "/");
            setcookie("width", $width, time() + 300, "/");

            //envia a la pagina donde se mostrara esta informacion
            header("location:../tracking.php");
        }
    }
}

?>