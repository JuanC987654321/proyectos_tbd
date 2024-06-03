<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <link href="styles/Estilo.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800&display=swap" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="form-container">
        <form action="php/reset_password.php" method="post" class="login-form" onsubmit="return validatePassword()">
            <h2>Restablecer Contraseña</h2>
            <img id="i-res" src="images/resetear.png" width="100" alt="Icono de restablecer contraseña" class="center">
            <div class="formulario">
                <label class="label" for="new_password">Nueva Contraseña</label>
                <input required type="password" name="new_password" id="new_password" placeholder="Ingrese su nueva contraseña" oninput="checkPassword()">
                <label>
                    <input type="checkbox" onclick="togglePasswordVisibility()"> Mostrar contraseñas
                </label>
                <ul class="password-requirements">
                    <li id="length" class="invalid">Al menos 8 caracteres</li>
                    <li id="uppercase" class="invalid">Una letra mayúscula</li>
                    <li id="number" class="invalid">Un número</li>
                </ul>
                <label class="label" for="confirm_password">Confirmar Contraseña</label>
                <input required type="password" name="confirm_password" id="confirm_password" placeholder="Confirme su nueva contraseña" oninput="checkPassword()">
                <ul class="password-requirements">
                    <li id="match" class="invalid">Las contraseñas coinciden</li>
                </ul>
                <input type="submit" value="Restablecer Contraseña">
            </div>
        </form>
    </div>
</div>

<script>
    function checkPassword() {
        const password = document.getElementById('new_password').value;
        const confirmPassword = document.getElementById('confirm_password').value;
        const lengthRequirement = document.getElementById('length');
        const uppercaseRequirement = document.getElementById('uppercase');
        const numberRequirement = document.getElementById('number');
        const matchRequirement = document.getElementById('match');
        
        // Validar longitud
        if (password.length >= 8) {
            lengthRequirement.classList.remove('invalid');
            lengthRequirement.classList.add('valid');
        } else {
            lengthRequirement.classList.remove('valid');
            lengthRequirement.classList.add('invalid');
        }

        // Validar letra mayúscula
        if (/[A-Z]/.test(password)) {
            uppercaseRequirement.classList.remove('invalid');
            uppercaseRequirement.classList.add('valid');
        } else {
            uppercaseRequirement.classList.remove('valid');
            uppercaseRequirement.classList.add('invalid');
        }

        // Validar número
        if (/\d/.test(password)) {
            numberRequirement.classList.remove('invalid');
            numberRequirement.classList.add('valid');
        } else {
            numberRequirement.classList.remove('valid');
            numberRequirement.classList.add('invalid');
        }

        // Validar coincidencia de contraseñas
        if (password === confirmPassword && password.length > 0) {
            matchRequirement.classList.remove('invalid');
            matchRequirement.classList.add('valid');
        } else {
            matchRequirement.classList.remove('valid');
            matchRequirement.classList.add('invalid');
        }
    }

    function validatePassword() {
        const password = document.getElementById('new_password').value;
        const confirmPassword = document.getElementById('confirm_password').value;
        const passwordPattern = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;

        if (!passwordPattern.test(password)) {
            alert('La contraseña debe tener al menos 8 caracteres, incluyendo una letra mayúscula y un número.');
            return false;
        }

        if (password !== confirmPassword) {
            alert('Las contraseñas no coinciden.');
            return false;
        }

        return true;
    }

    function togglePasswordVisibility() {
        const newPassword = document.getElementById('new_password');
        const confirmPassword = document.getElementById('confirm_password');
        if (newPassword.type === 'password' && confirmPassword.type === 'password') {
            newPassword.type = 'text';
            confirmPassword.type = 'text';
        } else {
            newPassword.type = 'password';
            confirmPassword.type = 'password';
        }
    }
</script>

</body>
</html>

