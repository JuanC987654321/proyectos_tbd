<?php
// echo $_POST["nombre"] . "<br>";
// echo $_POST["apellido"] . "<br>";
// echo $_POST["usuario"] . "<br>";
// echo $_POST["rol"] . "<br>";
// echo $_POST["contra"] . "<br>";

require_once "connect.php";
$conexion = connect_to_db();

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$username = $_POST["usuario"];
$rol_asignado = $_POST["rol"];
$cont = $_POST["contra"];


//necesito el id creado para pasarselo a account
$queryBusqueda = "SELECT * FROM account WHERE Registered_Account = '$username'";
$res = $conexion->query($queryBusqueda);
if ($res->num_rows == 0){
    $query = "INSERT INTO staff (Name, Last_name, Role) VALUES ('$nombre', '$apellido', '$rol_asignado')";
    $conexion->query($query);
    $id_staff = mysqli_insert_id($conexion);

    $query2 = "INSERT INTO account (Registered_Account, Password, Id_staff) VALUES ('$username', '$cont', '$id_staff')";
    $conexion->query($query2);

    echo "<script>alert('Se ha creado un nuevo $rol_asignado\\nNombre: $nombre $apellido\\nUsuario: $username');</script>";
    
    header("location:../usuario.php");

}else{
    echo "<script>
    alert('ERROR\\nUsuario: \'$username\' ya se encuentra en la base de datos');
    history.go(-1);
    </script>";
}


?>