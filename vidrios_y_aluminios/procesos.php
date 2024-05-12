<?php
require_once "php/s_buscar.php";
require_once "php/s_status.php";
require_once "php/auth.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesos</title>
    <link href="styles/Procesos.css" rel="stylesheet">
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
<h1>Historial de Productos</h1>

<div class="top-controls">
    <form action="php/s_folio.php" method="post">
        <div class="search-container">
            <input required type="text" id="searchField" name="search_field" placeholder="Buscar productos...">
            <input type="submit" value="Buscar">
        </div>
    </form>
    <form action="php/s_status.php" method="get">

        <div class="buttons-container">
            <input type="hidden" name="accion" value="buscar_por_status">
            <input type="submit" name="status" value="En proceso">
            <input type="submit" name="status" value="Completado">
        </div>
    </form>
    </div>
    <div id="productList">
        <?php 
            if (isset($_GET['status'])) {
                buscar_todos("status LIKE '" . $_GET['status'] . "'");
            }else{
                buscar_todos();
            }
        ?>
    </div>
</main>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>