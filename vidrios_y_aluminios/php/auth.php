<?php
session_start();
if(!isset($_SESSION["id_staff"])) {
    echo "<script>alert('NO SE A ACCEDIDO A ESTA PAGINA DE MANERA CORRECTA, SERA REDIRECCIONADO A LA PAGINA DE INICIO DE SESION');window.location='index.php';</script>";
}else{
    if(isset($_SESSION["Role"])){
        echo("" . $_SESSION["Role"] . "");
    }
}
?>