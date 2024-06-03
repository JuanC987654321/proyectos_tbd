<?php
require_once "connect.php";
$conexion = connect_to_db();

//guarda las imagenes en la carpeta images/ImgServicios
//dentro de la carpeta del proyecto
$PATH_ImagenServicio = '../images/ImgServicios/';
$folio = $_POST["folio"];


$conexion->begin_transaction();
try{

    // $folio = "00001-260524-222851";
    $ruta_imagen = $PATH_ImagenServicio . $folio . ".jpg";
    if (!is_dir($PATH_ImagenServicio)) {
        mkdir($PATH_ImagenServicio, 0777, true);
    }

    if (move_uploaded_file($_FILES['imgServ']['tmp_name'], $ruta_imagen)) {
        $query = "SELECT Id_process FROM process WHERE Folio = '$folio'";
        $res = $conexion->query($query);
        if($res->num_rows > 0){
            while ($f = mysqli_fetch_assoc($res)) {
                $id_proc =  $f["Id_process"];
            }
        }
        $query = "UPDATE registration SET Photo = '$ruta_imagen' WHERE Id_process = '$id_proc'";
        $conexion->query($query);
        $conexion->commit();
        echo "<script>alert('Imagen subida con exito');history.go(-1);</script>";
        // $query = "INSERT INTO registration (Id_client, Id_process, Id_SH, Date_of_purchase, Photo, Statement_of_account, Quotation) 
        // VALUES ('$id_client', '$id_process', '$id_SH', '$fecha_hora_actual', 'N/APhoto', '$ruta_nuevo_estado_cuenta', '$ruta_nueva_cotizacion')";
        // $res = $conexion->query($query);
    }    
    else {
        echo "Error al mover el archivo subido.";
    }
}catch (Exception $e){
    $conexion->rollback();
    echo "Error en la transacción: " . $e->getMessage();
}

$conexion->close();
?>