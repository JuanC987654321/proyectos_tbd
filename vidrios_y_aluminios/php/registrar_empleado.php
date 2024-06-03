<?php
require_once "connect.php";
$conexion = connect_to_db();

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$username = $_POST["usuario"];
$rol_asignado = $_POST["rol"];
$cont = $_POST["contra"];
$security_question = $_POST["security_question"];
$security_answer = $_POST["security_answer"];

// Hashear la contraseña
$hashed_password = password_hash($cont, PASSWORD_DEFAULT);
$conexion->begin_transaction();
try{

    $queryBusqueda = "SELECT * FROM account WHERE Registered_Account = '$username'";
    $res = $conexion->query($queryBusqueda);
    if ($res->num_rows == 0){
        $query = "INSERT INTO staff (Name, Last_name, Role) VALUES ('$nombre', '$apellido', '$rol_asignado')";
        $conexion->query($query);
        $id_staff = mysqli_insert_id($conexion);

        $query2 = "INSERT INTO account (Registered_Account, Password, Id_staff, security_question, security_answer) VALUES ('$username', '$hashed_password', '$id_staff', '$security_question', '$security_answer')";
        $conexion->query($query2);

        echo "<script>alert('Se ha creado un nuevo $rol_asignado\\nNombre: $nombre $apellido\\nUsuario: $username');</script>";
        
        header("location:../usuario.php");
        
        $conexion->commit();
        exit();

    } else {
        echo "<script>
        alert('ERROR\\nUsuario: \'$username\' ya se encuentra en la base de datos');
        history.go(-1);
        </script>";
    }
}catch (Exception $e){
    $conexion->rollback();
    echo "Error en la transacción: " . $e->getMessage();
}

$conexion->close();
?>
