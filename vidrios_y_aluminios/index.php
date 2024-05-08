<!-- si hay una sesion abierta, al cargar la pagina de login la cierra -->
<?php
session_start();
if(isset($_SESSION["id_staff"])) {
    session_destroy();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesos</title>
    <link href="styles/style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>


   
    <form action="php/login.php" method="post">
        <img class="logo" src="images/logo.png" width="50" alt="Foto del logo" >
        <div class="formulario">
            <label class="label" for="">Usuario</label>
            <input required type="text" name="registered_account">


            <label class="label" for="folio">Contraseña</label>
            <input required type="password" name="password">
            <input type="submit" value="Ingresar">
       </div>
    </form>
</body>
</html>
