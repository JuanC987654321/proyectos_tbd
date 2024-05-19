<?php
require_once "connect.php";

function buscar_con_nombre($condition){
    $conexion = connect_to_db();
    $busqueda_query = "SELECT * FROM client WHERE " . $condition;
    
    $res = $conexion->query($busqueda_query);

    if ($res->num_rows > 0){
        while ($fila = mysqli_fetch_array($res)) {
            $busqueda2_query = "SELECT * FROM process WHERE id_client = " . $fila["id_client"];
            $res2 = $conexion->query($busqueda2_query);
            echo ("<div id=\"product-info\">");
            echo ("<h2 id=\'product-name\'>" . $fila["nombre"] . "</h2>");
            echo ("<ul id=\"modification-history\">");
            while ($fila2 = mysqli_fetch_array($res2)){
                echo ("<li>Folio: ". $fila2["Folio"] ."</li>");
            }
            echo ("</ul>");
            echo ("</div>");
        }
    }else{
        //aqui alertar de que no se encontro ninguna coincidencia en la
        //base de datos
        echo "<script>alert('No se encuentran servicios que concuerden con el parametro ingresado');</script>";
    }
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
                echo ("<h2 id=\'product-name\'>" . $fila2["nombre"] . "</h2>");
                echo ("<ul id=\"modification-history\">");
                echo ("<li>Folio: ". $fila["Folio"] ."</li>");
            }
            echo ("</ul>");
            echo ("</div>");
        }
    }else{
        //aqui alertar de que no se encontro ninguna coincidencia en la
        //base de datos
        echo "<script>alert('No se encuentran servicios que concuerden con el parametro ingresado');</script>";
    }
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
                echo ("<h2 id=\'product-name\'>" . $fila2["nombre"] . "</h2>");
                echo ("<ul id=\"modification-history\">");
                echo ("<li>Folio: ". $fila["Folio"] ."</li>");
            }
            echo ("</ul>");
            echo ("</div>");
        }
    }else{
        //aqui alertar de que no se encontro ninguna coincidencia en la
        //base de datos
        echo "<script>alert('No se encuentran servicios que concuerden con el parametro ingresado');</script>";
    }
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
            echo ("<h2 id=\'product-name\'>" . $fila["nombre"] . "</h2>");
            echo ("<ul id=\"modification-history\">");
            while ($fila2 = mysqli_fetch_array($res2)){
                
                echo ("<li>Folio: ". $fila2["Folio"] ."</li>");
                
            }
            echo ("</ul>");
            echo ("</div>");
        }
    }
}
?>