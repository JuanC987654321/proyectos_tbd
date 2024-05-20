<?php
require_once "php/auth.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="styles/notas.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vidrios y Aluminios Armando</title>
    <link href="styles/style.css" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<!-- sidebar -->
<?php
require_once "php/barraLateral.php";
?>


<main>
    <!-- <section id="contenedorfpp"> -->
    <div class="pizarra" id="pizarra">
        <!-- Aquí se cargarán las notas dinámicamente -->
    </div>
    <div class="nota-form">
        <textarea id="nuevaNota" placeholder="Escribe tu nota..."></textarea>
        <input type="color" id="colorNota" value="#ff0000"> <!-- Agregar input para seleccionar el color -->
        
    </div>

    <div class="buttons">
        <button onclick="agregarNota()">Agregar Nota</button>
        <button onclick="eliminarNotasSeleccionadas()">Eliminar Notas Seleccionadas</button>
    </div>

</main>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="js/script.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>