<?php
function check_is_rol($allowed_roles){
    session_start();
    if(!isset($_SESSION["Role"])) {
        echo "<script>alert('NO SE A ACCEDIDO A ESTA PAGINA DE MANERA CORRECTA, SERA REDIRECCIONADO A LA PAGINA DE INICIO DE SESION');window.location='index.php';</script>";
    }
    else if (!in_array($_SESSION["Role"], $allowed_roles)){
        echo "<script>alert('NO SE CUENTAN CON LOS PRIVILEGIOS PARA VER ESTA PAGINA');history.go(-1);</script>";
    }
}
?>