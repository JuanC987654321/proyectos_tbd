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

<form id = "employeeForm" action="php/registrar_empleado.php" method="post">
    <!-- <input type="hidden" id="employeeId"> -->

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" required>

    <label for="usuario">Nombre de usuario:</label>
    <input type="text" id="usuario" name="usuario" required>

    <label for="rol">Rol:</label><br>
    <select name="rol" id="rol">
        <option value="Administrador">Administrador</option>
        <option value="Empleado">Empleado</option>
    </select>

    <br>
    <br>
    <br>

    <label for="contra">Contraseña:</label>
    <input type="password" id="contra" name="contra" required>

    <button type="submit">Crear Empleado</button>
</form>

<div id="employeeList">
    <!-- Lista de empleados se cargará aquí -->

    <!-- (continuacion de registrar_empleado.php )
    y aqui leer la informacion de la base de datos para mostrar los empleados y sus respectivos
    botones -->
    <?php
        mostrar_empleados();
    ?>
    
</div>
</main>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="js/script.js"></script>
<script src="js/usuario.js"></script>


</body>
</html>