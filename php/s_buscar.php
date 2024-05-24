<?php
require_once "connect.php";


function mostar_informacion($OrderStatus, $folio){
    echo "<ul id=\"modification-history\">";
    echo "<div>";
    echo "<li>Folio: ". $folio . "<br>";
    echo "<button onClick=\"abrirModalInfo()\" class=\"btn btn-primary\" id=\"mostrarModal\">Informacion</button>";
    echo "</li></div></ul>";
}


function buscar_con_nombre($condition){
    $conexion = connect_to_db();
    $busqueda_query = "SELECT * FROM client WHERE " . $condition;
    
    $res = $conexion->query($busqueda_query);

    if ($res->num_rows > 0){
        while ($fila = mysqli_fetch_array($res)) {
            $busqueda2_query = "SELECT * FROM process WHERE id_client = " . $fila["id_client"];
            $res2 = $conexion->query($busqueda2_query);
            echo ("<div id=\"product-info\">");
            echo ("<h2 id=\"product-name\">" . $fila["nombre"] . "</h2>" . $fila["id_client"]);
            while ($fila2 = mysqli_fetch_array($res2)){
                mostar_informacion($fila2["OrderStatus"], $fila2["Folio"]);
            }

            echo ("</div>");
        }
    }else{
        echo "<script>alert('No se encuentran servicios que concuerden con el parametro ingresado');</script>";
    }
    $conexion->close();
}

function buscar_con_folio($condition){
    $conexion = connect_to_db();
    $busqueda_query = "SELECT * FROM process WHERE " . $condition;
    
    $res = $conexion->query($busqueda_query);

    if ($res->num_rows > 0){
        while ($fila = mysqli_fetch_array($res)) {
            $busqueda2_query = "SELECT * FROM client WHERE id_client = " . $fila["id_client"];
            $res2 = $conexion->query($busqueda2_query);
            echo ("<div id=\"product-info\">");
            while ($fila2 = mysqli_fetch_array($res2)){
                echo ("<h2 id=\"product-name\">" . $fila2["nombre"] . "</h2>" . $fila["id_client"]);
                mostar_informacion($fila["OrderStatus"], $fila["Folio"]);
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
    $busqueda_query = "SELECT * FROM process WHERE " . $condition;
    
    $res = $conexion->query($busqueda_query);

    if ($res->num_rows > 0){
        while ($fila = mysqli_fetch_array($res)) {
            $busqueda2_query = "SELECT * FROM client WHERE id_client = " . $fila["id_client"];
            $res2 = $conexion->query($busqueda2_query);
            echo ("<div id=\"product-info\">");
            while ($fila2 = mysqli_fetch_array($res2)){
                echo ("<h2 id=\"product-name\">" . $fila2["nombre"] . "</h2>" . $fila["id_client"]);
                mostar_informacion($fila["OrderStatus"], $fila["Folio"]);
            }
            echo ("</ul>");
            echo ("</div>");
        }
    }else{
        echo "<script>alert('No se encuentran servicios que concuerden con el parametro ingresado');</script>";
    }
    $conexion->close();
}


function buscar_todos(){
    $conexion = connect_to_db();
    $busqueda_query = "SELECT * FROM client";
    $res = $conexion->query($busqueda_query);

    if ($res->num_rows > 0){
        while ($fila = mysqli_fetch_array($res)) {
            $busqueda2_query = "SELECT * FROM process WHERE id_client LIKE " . $fila["id_client"];
            $res2 = $conexion->query($busqueda2_query);
            echo ("<div id=\"product-info\">");
            echo ("<h2 id=\"product-name\">" . $fila["nombre"] . "</h2>" . $fila["id_client"]);
            while ($fila2 = mysqli_fetch_array($res2)){
                mostar_informacion($fila2["OrderStatus"], $fila2["Folio"]);
            }
            echo ("</ul>");
            echo ("</div>");
        }
    }
    $conexion->close();
}
?>