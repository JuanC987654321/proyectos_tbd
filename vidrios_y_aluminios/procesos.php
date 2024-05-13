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
        <div class="inline-container">
            <form action="php/s_folio.php" method="post" class="inline-form">
                <input required type="text" id="searchField" name="search_field" placeholder="Buscar productos...">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
            <form action="php/s_status.php" method="get" class="inline-form">
                <input type="hidden" name="accion" value="buscar_por_status">
                <button type="submit" name="status" value="En proceso" class="btn btn-primary">En proceso</button>
                <button type="submit" name="status" value="Completado" class="btn btn-primary">Completado</button>
            </form>
            <div class="ingresar-container">
                <button id="ingresarBtn" class="btn btn-primary">Ingresar</button> <!-- Botón "Ingresar" -->
            </div>
        </div>
    </div>
    <div id="productList">
        <?php 
            if (isset($_GET['status'])) {
                buscar_todos("status LIKE '" . $_GET['status'] . "'");
            } else {
                buscar_todos();
            }
        ?>
    </div>
</main>

<!-- Modal -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <form action="tu_script_php.php" method="post">
            <label for="idRegistro">ID de Registro:</label>
            <input type="text" id="idRegistro" name="id_registro" required><br>

            <label for="nombreCliente">Nombre del Cliente:</label>
            <input type="text" id="nombreCliente" name="nombre_cliente" required><br>

            <label for="idFolio">ID de Folio:</label>
            <input type="text" id="idFolio" name="id_folio" required><br>

            <button type="submit" class="btn btn-primary">Aceptar</button>
        </form>
    </div>
</div>

<script>
    // Función para abrir el modal
    function abrirModal() {
        document.getElementById('modal').style.display = 'block';
    }

    // Función para cerrar el modal
    function cerrarModal() {
        document.getElementById('modal').style.display = 'none';
    }

    // Agregar event listener para abrir el modal cuando se hace clic en el botón "Ingresar"
    document.getElementById('ingresarBtn').addEventListener('click', abrirModal);

    // Agregar event listener para cerrar el modal cuando se hace clic en el botón de cerrar
    document.getElementsByClassName('close')[0].addEventListener('click', cerrarModal);
</script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<style>
    /* Estilos para el modal */
    .modal {
        display: none;
        position: fixed;
        z-index: 999; /* Asegura que esté por encima de todo */
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.4); /* Fondo semi-transparente */
        overflow: auto; /* Permite desplazarse cuando el contenido es demasiado grande */
    }

    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%; /* Ancho del modal */
        max-width: 500px; /* Máximo ancho del modal */
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    /* Estilos adicionales */
    .inline-container {
        display: flex;
        align-items: center;
    }

    .inline-form {
        margin-right: 10px;
    }

    .ingresar-container {
        margin-left: 10px; /* Ajusta el espacio entre el botón "Ingresar" y los otros elementos */
    }

    .ingresar-container button {
        padding: 8px 12px; /* Ajusta el padding del botón "Ingresar" */
    }
</style>
</body>
</html>