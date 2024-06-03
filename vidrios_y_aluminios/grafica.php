<?php
require_once "php/auth.php";
check_is_rol(["Empleado", "Administrador"]);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graficas</title>
    <link href="styles/style.css" rel="stylesheet">
    <link href="styles/sidebar.css" rel="stylesheet">
    <link href="styles/Graficas.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<!-- sidebar -->
<?php
require_once "php/barraLateral.php";
?>


<main>
    <h1>Calificacion de Servicios</h1>
    <br><br><br><br>
    <h2>Tiempo de finalizacion</h2>
    <canvas id="salesChart" width="400" height="200"></canvas>
    <br><br><br><br>
    <h2>Calidad del material</h2>
    <canvas id="salesChart2" width="400" height="200"></canvas>
    <br><br><br><br>
    <h2>Servicio al cliente</h2>
    <canvas id="salesChart3" width="400" height="200"></canvas>
    <script src="js/Graficas.js"></script>
    <script src="js/script.js"></script>
</main>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="js/script.js"></script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>