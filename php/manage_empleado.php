<?php

require_once "connect.php";
$conexion = connect_to_db();


$id_staff = $_POST["ID_Staff"];
$rol = $_POST["rol"];
$nombre_completo = $_POST["nombre_completo"];

session_start();
if ($_SESSION["id_staff"] != $id_staff){
    if ($_POST['accion'] == 'Aceptar') {
        $query = "UPDATE staff SET Role = '$rol' WHERE ID_Staff = '$id_staff'";
        $conexion->query($query);
        echo "<script>alert('Rol de " . $nombre_completo . " Editado con exito');</script>";

        
    } elseif ($_POST['accion'] == 'Eliminar') {
        $query = "DELETE FROM account WHERE Id_staff = '$id_staff'";
        $conexion->query($query);
        $query2 = "DELETE FROM staff WHERE ID_Staff = '$id_staff'";
        $conexion->query($query2);

        echo "<script>alert('" . $nombre_completo . " Eliminado con exito')</script>";
    }
}else{
    echo "<script>alert('ERROR\\nNo puede borrar su propio usuario o quitarse los privilegios de Administrador');</script>";
}

echo "<script>history.go(-1);</script>";
$conexion->close();

?>