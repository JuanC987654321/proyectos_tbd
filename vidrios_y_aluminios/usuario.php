<?php
require_once "php/auth.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link href="styles/usuario.css" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet">
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

<form id="employeeForm">
    <input type="hidden" id="employeeId">

    <label for="employeeName">Nombre:</label>
    <input type="text" id="employeeName" name="employeeName" required>

    <label for="employeeEmail">Email:</label>
    <input type="email" id="employeeEmail" name="employeeEmail" required>

    <button type="button" onclick="createEmployee()">Crear Empleado</button>
    <button type="button" onclick="updateEmployee()">Actualizar Empleado</button>
    <button type="button" onclick="deleteEmployee()">Eliminar Empleado</button>
</form>

<h2>Permisos</h2>
<form id="permissionsForm">
    <div>
        <input type="checkbox" id="dashboard" name="dashboard">
        <label for="dashboard">Procesos</label>
    </div>
    <div>
        <input type="checkbox" id="reports" name="reports">
        <label for="reports">Gráficas</label>
    </div>
    <div>
        <input type="checkbox" id="dashboard" name="dashboard">
        <label for="dashboard">Ventas</label>
    </div>
    <div>
        <input type="checkbox" id="reports" name="reports">
        <label for="reports">Usuario</label>
    </div>
    <button type="button" onclick="updatePermissions()">Actualizar Permisos</button>
</form>

<div id="employeeList">
    <!-- Lista de empleados se cargará aquí -->
</div>
</main>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="js/script.js"></script>
<script src="js/usuario.js"></script>


</body>
</html>