<?php


require_once "connect.php";
$conexion = connect_to_db();



function mostrar_empleados(){
    global $conexion;
    $query = "SELECT * FROM staff";
    $res = $conexion->query($query);
    if ($res->num_rows > 0){
        echo "<table border='1'>";
        echo "<tr><th>Nombre Completo</th><th>Rol</th><th>Acciones</th></tr>";

        while ($fila = mysqli_fetch_array($res)) {
            $nombre_completo = $fila["Name"] . " " . $fila ["Last_name"];
            echo "<tr>";
            echo "<td>" . $nombre_completo . "</td>";
            echo "<td>";
            echo "<form action=\"php/manage_empleado.php\" method=\"post\">";
            echo "<input type=\"hidden\" name=\"ID_Staff\" value=\"" . $fila['ID_Staff'] . "\">";
            echo "<input type=\"hidden\" name=\"nombre_completo\" value=\"" . $nombre_completo . "\">";
            echo "<select name=\"rol\" id=\"rol\">";

            if ($fila["Role"] == "Administrador"){
                echo "<option selected value=\"Administrador\">Administrador</option>";
                echo "<option value=\"Empleado\">Empleado</option>";
            } else {
                echo "<option value=\"Administrador\">Administrador</option>";
                echo "<option selected value=\"Empleado\">Empleado</option>";
            }

            echo "</select>";
            echo "</td>";
            echo "<td>";
            echo "<button name=\"accion\" type=\"submit\" value=\"Aceptar\">Aceptar</button>";
            echo "<button id=\"Eliminar\" name=\"accion\" type=\"submit\" value=\"Eliminar\">Eliminar</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
            }
}

?>