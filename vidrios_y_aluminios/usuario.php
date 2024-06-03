<?php
require_once "php/auth.php";
require_once "php/mostrar_lista_empleados.php";
check_is_rol(["Administrador"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link href="styles/usuario.css" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet">
    <link href="styles/sidebar.css" rel="stylesheet">
    <link href="styles/normalize.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<!-- sidebar -->
<?php
require_once "php/barraLateral.php";
?>

<main>
    <h1>Administración de Empleados</h1>

    <form id="employeeForm" action="php/registrar_empleado.php" method="post" onsubmit="return validatePassword()">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>

        <label for="usuario">Nombre de usuario:</label>
        <input type="text" id="usuario" name="usuario" required>

        <label for="rol">Rol:</label>
        <select name="rol" id="rol">
            <option value="Administrador">Administrador</option>
            <option value="Empleado">Empleado</option>
        </select>

        <label for="contra">Contraseña:</label>
        <input type="password" id="contra" name="contra" required oninput="checkPassword()">
        <label>
            <input type="checkbox" onclick="togglePasswordVisibility()"> Mostrar contraseña
        </label>
        <ul class="password-requirements">
            <li id="length" class="invalid">Al menos 8 caracteres</li>
            <li id="uppercase" class="invalid">Una letra mayúscula</li>
            <li id="number" class="invalid">Un número</li>
        </ul>

        <label for="security_question">Pregunta de Seguridad:</label>
        <select id="security_question" name="security_question" required>
            <option value="Nombre de tu primera mascota">Nombre de tu primera mascota</option>
            <option value="Nombre de tu mejor amigo de la infancia">Nombre de tu mejor amigo de la infancia</option>
            <option value="Ciudad donde naciste">Ciudad donde naciste</option>
        </select>

        <label for="security_answer">Respuesta de Seguridad:</label>
        <input type="text" id="security_answer" name="security_answer" required>

        <button type="submit">Crear Empleado</button>
    </form>

    <div id="employeeList">
        <!-- Lista de empleados se cargará aquí -->
        <?php
            mostrar_empleados();
        ?>
    </div>
</main>

<script>
    function checkPassword() {
        const password = document.getElementById('contra').value;
        const lengthRequirement = document.getElementById('length');
        const uppercaseRequirement = document.getElementById('uppercase');
        const numberRequirement = document.getElementById('number');
        
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
    }

    function validatePassword() {
        const password = document.getElementById('contra').value;
        const passwordPattern = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;

        if (!passwordPattern.test(password)) {
            alert('La contraseña debe tener al menos 8 caracteres, incluyendo una letra mayúscula y un número.');
            return false;
        }

        return true;
    }

    function togglePasswordVisibility() {
        const password = document.getElementById('contra');
        if (password.type === 'password') {
            password.type = 'text';
        } else {
            password.type = 'password';
        }
    }
</script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="js/script.js"></script>
<script src="js/usuario.js"></script>

</body>
</html>
