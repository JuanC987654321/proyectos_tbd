<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="styles/Estilo.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800&display=swap" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="form-container">
        <form action="php/login.php" method="post" class="login-form">
            <img class="logo" src="images/logo.png" width="400" alt="Foto del logo">
            <div class="formulario">
                <label class="label" for="usuario">Usuario :</label>
                <input required type="text" name="registered_account" id="usuario" placeholder="Ingrese su usuario">

                <label class="label" for="password">Contraseña :</label>
                <input required type="password" name="password" id="password" placeholder="Ingrese su contraseña">
                <label>
                    <input type="checkbox" onclick="togglePasswordVisibility()"> Mostrar contraseña
                </label>
                <input type="submit" value="Ingresar">
                <label class="recuperarcuenta">
                    <a href="forgot_password.php">¿Olvidaste tu contraseña?</a>
                    <!-- <a href="#" id="forgot-username">¿Olvidaste tu usuario?</a> -->
                </label>
            </div>
        </form>
    </div>
</div>

<script>
    function togglePasswordVisibility() {
        const password = document.getElementById('password');
        if (password.type === 'password') {
            password.type = 'text';
        } else {
            password.type = 'password';
        }
    }

    document.getElementById('forgot-username').addEventListener('click', function(event) {
        event.preventDefault(); // Evita la acción predeterminada del enlace
        alert('Para recuperar su usuario contacte con la secretaria.');
    });
</script>

</body>
</html>
