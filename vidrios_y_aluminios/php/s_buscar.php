<?php
require_once "connect.php";


function buscar_todos($condition=""){
    $conexion = connect_to_db();
    $busqueda_query = "SELECT * FROM process";
    if ($condition != ""){
        $busqueda_query = $busqueda_query . " WHERE " . $condition;
    }
    $res = $conexion->query($busqueda_query);

    if ($res->num_rows > 0){
        while ($fila = mysqli_fetch_array($res)) {
            echo ("<div id=\"product-info\">");
            echo ("<h2 id=\"product-name\">" . $fila["Folio"] . "</h2>");
            echo ("<ul id=\"modification-history\">");
            echo ("<li>Status: ". $fila["Status"] ."</li>");
            //echo ("<li>Precio: $". $fila["Price"] ."</li>");
            //echo ("<li>Anticipo: $". $fila["Advance_payment"] ."</li>");
            echo ("</ul>");
            echo ("</div>");
        }
    }else{
        //aqui alertar de que no se encontro ninguna coincidencia en la
        //base de datos
    }
}
?>