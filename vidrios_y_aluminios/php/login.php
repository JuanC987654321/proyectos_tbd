<?php
require_once 'connect.php';
$conexion = connect_to_db();


iniciar_sesion($conexion);


//ENCRIPTAR LA CONTRASEÑA TANTO AQUI COMO EN LA BASE DE DATOS
//ESTA MADRE ESTA COMO TEXTO PLANO TODAVIA Y TIENE DIAS QUE ESTOY
//AL TANTO DE ESO, NO SE PUEDE QUEDAR ASI, NO VOY A COMETER EL
//MISMO ERROR 2 VECES
function iniciar_sesion($conexion){
    $registered_account = $_POST["registered_account"];
    $password = $_POST["password"];

    $login_query = "SELECT * FROM account
    WHERE Registered_Account LIKE '$registered_account'
    AND Password LIKE '$password'";

    $res_login = $conexion->query($login_query);
    if ($res_login->num_rows > 0) {
        session_start();
        while ($filaAccount = mysqli_fetch_array($res_login)) {
            $_SESSION["username"] = $filaAccount["Registered_Account"];
            $_SESSION["id_staff"] = $filaAccount["Id_staff"];
            $id = $_SESSION["id_staff"];
            $query_staff = "SELECT * FROM staff WHERE ID_staff LIKE '$id'";
            $res_staff = $conexion->query($query_staff);
            if($res_staff->num_rows > 0){
                while ($fila_staff = mysqli_fetch_array($res_staff)){
                    $_SESSION["Name"] = $fila_staff["Name"];
                    $_SESSION["Last_name"] = $fila_staff["Last_name"];
                    $_SESSION["Role"] = $fila_staff["Role"];
                }
            }
        }
        header("location:../paginaprincipal.php");
    } else {
        echo "<script>alert('Usuario o Contraseña incorrectos');window.location='../login.html';</script>";
    }
    $conexion->close();
}
?>