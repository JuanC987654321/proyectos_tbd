<?php
require_once "connect.php";

// if(isset($_GET['accion']) && function_exists($_GET['accion'])) {
//     $accion = $_GET['accion'];
//     //echo $_GET["param"];
//     $inico = $_GET["fecha_incio"];
//     $final = $_GET["fecha_final"];
//     // $accion($inico, $final); // Llamar a la función
// }







function mostar_informacion($con, $nombre, $numCli, $OrderStatus, $folio, $id_proceso){
    $query = "SELECT precio_total, abonado FROM sales_history WHERE id_process = " . $id_proceso;
    $res = $con->query($query);
    if ($res->num_rows > 0) {
        $fila = $res->fetch_assoc();
        $precio = $fila["precio_total"];
        $abono = $fila["abonado"];
    }else{
        echo "<script>console.log(AAAAAAAAAAAAAAA YA EXPLOTO EL PROGRAMA)</script>";
    }
    echo "<ul id=\"modification-history\">";
    echo "<div>";
    echo "<li>Folio: ". $folio . "<br>";
    echo "<button onClick=\"abrirModalInfo('$nombre', '$folio', '$OrderStatus', '$numCli', '$precio', '$abono')\" class=\"btn btn-primary\" id=\"mostrarModal\">Informacion</button>";
    // echo "<button onClick=\"abrirModalInfo('$nombre', '$folio', '$numCli')\" class=\"btn btn-primary\" id=\"mostrarModal\">Informacion</button>";

    echo "</li></div></ul>";
}





function buscar_con_fechas(){
    // Verifica si las fechas han sido enviadas
    $conexion = connect_to_db();
    $fecha_inicio = $_GET['fecha_inicio'];
    $fecha_final = $_GET['fecha_final'];

    // Valida que las fechas no estén vacías
    if (!empty($fecha_inicio) && !empty($fecha_final)) {
        // Prepara la consulta SQL
        $sql = "
            SELECT *
            FROM registration r
            JOIN process p ON r.Id_process = p.Id_process
            JOIN client c ON p.id_client = c.id_client
            WHERE r.Date_of_purchase >= ?
            AND r.Date_of_purchase < DATE_ADD(?, INTERVAL 1 DAY)
            AND p.OrderStatus = ?
        ";

        // Prepara la declaración
        $stmt = $conexion->prepare($sql);

        $statusComplet = "Completado";
        // Asigna los parámetros
        $stmt->bind_param("sss", $fecha_inicio, $fecha_final, $statusComplet);

        // Ejecuta la consulta
        $stmt->execute();

        // Obtén el resultado
        $resultado = $stmt->get_result();

        // Verifica si hay resultados
        if ($resultado->num_rows > 0) {
            // Muestra los resultados
            while ($fila = $resultado->fetch_assoc()) {
                $nombre = $fila["nombre"];
                $folio = $fila["Folio"];
                $id_cliente = $fila["id_client"];
                $orderStatus = $fila["OrderStatus"];
                $id_proc = $fila["ID_Process"];
                echo ("<div id=\"product-info\">");
                echo ("<h2 id=\"product-name\">" . $nombre . "</h2>");
                mostar_informacion($conexion, $nombre, $id_cliente, $orderStatus, $folio, $id_proc);

                // echo "Id_process: " . $fila['Id_process'] . " - Date_of_purchase: " . $fila['Date_of_purchase'] . " - OrderStatus: " . $fila['OrderStatus'] . "<br>";
                echo ("</div>");
            }
        } else {
            echo "No se encontraron resultados para el rango de fechas especificado.";
        }

        // Cierra la declaración
        $stmt->close();
    } else {
        echo "Por favor, seleccione un rango de fechas válido.";
    }
    

    // Cierra la conexión
    $conexion->close();
}


function buscar_con_nombre($condition){
    $conexion = connect_to_db();
    $busqueda_query = "SELECT * FROM client WHERE " . $condition;
    
    $res = $conexion->query($busqueda_query);
    
    if ($res->num_rows > 0){
        while ($fila = mysqli_fetch_array($res)) {
            $id_cliente = $fila["id_client"];
            $nombre = $fila["nombre"];

            $busqueda2_query = "SELECT * FROM process WHERE id_client = " . $id_cliente;
            $res2 = $conexion->query($busqueda2_query);

            echo ("<div id=\"product-info\">");
            echo ("<h2 id=\"product-name\">" . $nombre . "</h2>");
            while ($fila2 = mysqli_fetch_array($res2)){
                $orderStatus = $fila2["OrderStatus"];
                $folio = $fila2["Folio"];
                $id_proc = $fila2["ID_Process"];
                mostar_informacion($conexion, $nombre, $id_cliente, $orderStatus, $folio, $id_proc);
            }

            echo ("</div>");
        }
    }else{
        echo "<script>alert('No se encuentran servicios');</script>";
    }
    $conexion->close();
}

function buscar_con_folio($condition){
    $conexion = connect_to_db();
    $busqueda_query = "SELECT * FROM process WHERE " . $condition;
    $res = $conexion->query($busqueda_query);
    
    
    if ($res->num_rows > 0){
        while ($fila = mysqli_fetch_array($res)) {
            $orderStatus = $fila["OrderStatus"];
            $folio = $fila["Folio"];
            $id_cliente = $fila["id_client"];
            $id_proc = $fila["ID_Process"];

            $busqueda2_query = "SELECT * FROM client WHERE id_client = " . $id_cliente;
            $res2 = $conexion->query($busqueda2_query);
            
            echo ("<div id=\"product-info\">");
            while ($fila2 = mysqli_fetch_array($res2)){
                $nombre = $fila2["nombre"];
                echo ("<h2 id=\"product-name\">" . $nombre . "</h2>");
                mostar_informacion($conexion, $nombre, $id_cliente, $orderStatus, $folio, $id_proc);
            }
            echo ("</ul>");
            echo ("</div>");
        }
    }else{
        echo "<script>alert('No se encuentran servicios que concuerden con el parametro ingresado');</script>";
    }
    $conexion->close();
}

function buscar_con_status($condition){
    $conexion = connect_to_db();
    $busqueda_query = "SELECT * FROM client";
    
    $res = $conexion->query($busqueda_query);
    
    if ($res->num_rows > 0){
        while ($fila = mysqli_fetch_array($res)) {
            $id_cliente = $fila["id_client"];
            $nombre = $fila["nombre"];

            $busqueda2_query = "SELECT * FROM process WHERE id_client = " . $id_cliente . "&& $condition ";
            $res2 = $conexion->query($busqueda2_query);

            if($res2->num_rows > 0){
                echo ("<div id=\"product-info\">");
                echo ("<h2 id=\"product-name\">" . $nombre . "</h2>");
                while ($fila2 = mysqli_fetch_array($res2)){
                    $orderStatus = $fila2["OrderStatus"];
                    $folio = $fila2["Folio"];
                    $id_proc = $fila2["ID_Process"];
                    mostar_informacion($conexion, $nombre, $id_cliente, $orderStatus, $folio, $id_proc);
                }
            }
            echo ("</div>");
        }
    }else{
        echo "<script>alert('No se encuentran servicios que concuerden con el parametro ingresado');</script>";
    }
    $conexion->close();
}







// function buscar_con_status($condition){
//     $conexion = connect_to_db();
//     $busqueda_query = "SELECT * FROM process WHERE " . $condition;
//     $res = $conexion->query($busqueda_query);
    
    
//     if ($res->num_rows > 0){
//         while ($fila = mysqli_fetch_array($res)) {
//             $id_cliente = $fila["id_client"];
//             $orderStatus = $fila["OrderStatus"];
//             $folio = $fila["Folio"];
//             $id_proc = $fila["ID_Process"];

//             $busqueda2_query = "SELECT * FROM client WHERE id_client = " . $id_cliente;
//             $res2 = $conexion->query($busqueda2_query);
            
            
//             echo ("<div id=\"product-info\">");
//             while ($fila2 = mysqli_fetch_array($res2)){
//                 $nombre = $fila2["nombre"];
//                 echo ("<h2 id=\"product-name\">" . $nombre . "</h2>");
//                 mostar_informacion($conexion, $nombre, $id_cliente, $orderStatus, $folio, $id_proc);
//             }
//             echo ("</ul>");
//             echo ("</div>");
//         }
//     }else{
//         echo "<script>alert('No se encuentran servicios que concuerden con el parametro ingresado');</script>";
//     }
//     $conexion->close();
// }


// function buscar_todos(){
//     $conexion = connect_to_db();
//     $busqueda_query = "SELECT * FROM client";
//     $res = $conexion->query($busqueda_query);

    
//     if ($res->num_rows > 0){
//         while ($fila = mysqli_fetch_array($res)) {
//             $nombre = $fila["nombre"];
//             $id_cliente = $fila["id_client"];
//             $busqueda2_query = "SELECT * FROM process WHERE id_client LIKE " . $id_cliente;
//             $res2 = $conexion->query($busqueda2_query);
            
            
//             echo ("<div id=\"product-info\">");
//             echo ("<h2 id=\"product-name\">" . $nombre . "</h2>");
//             while ($fila2 = mysqli_fetch_array($res2)){

//                 $orderStatus = $fila2["OrderStatus"];
//                 $folio = $fila2["Folio"];
//                 $id_proc = $fila2["ID_Process"];

//                 mostar_informacion($conexion, $nombre, $id_cliente, $orderStatus, $folio, $id_proc);
//             }
//             echo ("</ul>");
//             echo ("</div>");
//         }
//     }
//     $conexion->close();
// }
?>