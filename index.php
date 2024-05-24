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
    <title>Inicio</title>
    <link href="styles/Estilo.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>

<form action="php/login.php" method="post" class="login-form">
        <img class="logo" src="images/logo.png" width="400" alt="Foto del logo">
        <div class="formulario">
            <label class="label" for="usuario">Usuario</label>
            <input required type="text" name="registered_account" id="usuario">

            <label class="label" for="password">Contraseña</label>
            <div class="password-field">
                <input required type="password" name="password" id="password">
                <button type="button" onclick="togglePasswordVisibility()" class="toggle-password">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
            <input type="submit" value="Ingresar">
        </div>
    </form>

    <script>
        function togglePasswordVisibility() {
            let passwordInput = document.getElementById('password');
            let toggleButton = document.querySelector('.toggle-password i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleButton.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleButton.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>

</body>
</html>
