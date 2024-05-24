<?php
require_once "php/s_buscar.php";
require_once "php/s_trab_serv.php";
require_once "php/auth.php";
check_is_rol(["Empleado", "Administrador"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios</title>
    <link href="styles/servicios.css" rel="stylesheet">
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
    <h1>Historial de Servicios</h1>

    <div class="top-controls">
        <div class="inline-container">
            <form action="php/s_trab_serv.php" method="get" class="inline-form">
                <input required type="text" id="param" name="param" placeholder="Buscar proceso...">
                <input type="hidden" name="accion" value="buscar_por_folio_o_nombre">
                <button type="submit" class="btn btn-primary" value="En proceso">Buscar</button>
            </form>
            <form action="php/s_trab_serv.php" method="get" class="inline-form">
                <input type="hidden" name="accion" value="buscar_por_status">
                <button type="submit" name="param" value="En proceso" class="btn btn-primary">En proceso</button>
                <button type="submit" name="param" value="Completado" class="btn btn-primary">Completado</button>
            </form>
            <div class="ingresar-container">
                <button id="ingresarBtn" class="btn btn-primary">Ingresar</button> <!-- Botón "Ingresar" -->
            </div>
        </div>
    </div>
    <div id="productList">
        <?php 
            if (isset($_GET['status'])) {
                // buscar_todos("'Order status' LIKE '" . $_GET['status'] . "'");
                buscar_con_status("OrderStatus = '" . $_GET['status'] . "'");
            }

            else if(isset($_GET['folio'])){
                // buscar_todos("process", "client", "Folio LIKE '" . $_GET['folio'] . "'");
                buscar_con_folio("Folio = '" . $_GET['folio'] . "'");
            }
            else if (isset($_GET['nombre'])){
                // buscar_todos("client", "process", "nombre LIKE '" . $_GET['nombre'] . "'");
                buscar_con_nombre("nombre = '" . $_GET['nombre'] . "'");
            }
             else {
                buscar_todos();
            }
        ?>
    </div>
</main>



<!-- MODAL INFO -->
<!-- Modal -->
<div id="modalInfo" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div>
            <label for="nombreCliente">Nombre del Cliente: Eduadro</label>
        </div>

        <div>
            <label for="folio">Folio:12345-123456-123456</label>
        </div>

        <div>
            <label for="numeroCliente">Numero del Cliente: 8</label>
        </div>

        <div>
            <label for="precio">Precio: $2500</label>
        </div>

        <div>
            <label for="abono">Abonado: $2000</label>
        </div>
        <hr>

        <form action="" method="post">
            <div>
                <label for="abono">Editar precio:</label>
                <input type="number" step=0.01 id="abono" name="abono" required>
            </div>
            <button type="submit" class="btn btn-primary">Aceptar</button>
            <br><br>
        </form>

        <form action="" method="post">
            <div>
                <label for="abono">Abonar:</label>
                <input type="number" step=0.01 id="abono" name="abono" required>
            </div>
            <button type="submit" class="btn btn-primary">Aceptar</button>
            <br><br>
        </form>

        <form action="" method="post">
            <div>
                <Label for="estado">Estado del pedido:</Label>
                <select name="rol" id="rol">
                    <option value="En proceso">En proceso</option>
                    <option value="Completado">Completado</option>
                </select>
                <br><br><br>
            </div>            
            <button type="submit" class="btn btn-primary">Aceptar</button>
        </form>
    </div>
</div>

<!-- Modal -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <form action="php/insert.php" method="post">
            <div>
                <label for="nombreCliente">Nombre del Cliente:</label>
                <input type="text" id="nombreCliente" name="nombre_cliente" required><br>
            </div>

            <div>
                <label for="numeroCliente">Numero del Cliente:</label>
                <input type="text" id="numeroCliente" name="numero_cliente" required><br>
            </div>

            <div>
                <label for="precio">Precio:</label>
                <input type="number" step=0.01 id="precio" name="precio" required><br>
            </div>

            <div>
                <label for="abono">Abono:</label>
                <input type="number" step=0.01 id="abono" name="abono" required><br>
            </div>

            <div>
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" required><br>
            </div>

            <div>
                <label for="archivo">Subir Archivo o Imagen:</label>
                <input type="file" id="archivo" name="archivo" accept="image/*, .pdf"><br>
            </div>
            
            <button type="submit" class="btn btn-primary">Aceptar</button>
        </form>
    </div>
</div>

<script>
    function abrirModalInfo(){
        document.getElementById("modalInfo").style.display = "block";
    }

    function cerrarModalInfo(){
        document.getElementById("modalInfo").style.display = "none";
    }

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
    var closeButtons = document.getElementsByClassName('close');
    // Itera sobre todos los elementos y añade el evento 'click' con la función cerrarModal
    for (var i = 0; i < closeButtons.length; i++) {
        closeButtons[i].addEventListener('click', cerrarModal);
        closeButtons[i].addEventListener('click', cerrarModalInfo);
    }
</script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<style>
    /* Estilos generales */
    body {
    font-family: Arial, sans-serif;
    }

    /* Estilos para el modal */
    .modal {
        display: none; /* Oculto por defecto */
        position: fixed; /* Se mantiene en lugar fijo en la pantalla */
        z-index: 1; /* Siempre en el frente */
        left: 0;
        top: 0;
        width: 100%; /* Ancho completo */
        height: 100%; /* Alto completo */
        overflow: auto; /* Habilita scroll si es necesario */
        background-color: rgb(0,0,0); /* Color de fondo */
        background-color: rgba(0,0,0,0.4); /* Negro con opacidad */
    }

    .modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% desde arriba y centrado */
    position: relative;   /* Contexto para posicionamiento */
    padding: 20px;
    border: 1px solid #888;
    width: 20%; /* Podrías ajustar esto según tus necesidades */
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 40px 0 rgba(0,0,0,0.19);
    }

    /* Botón para cerrar */
    .close {
    color: #aaa;
    float: left;         /* Mueve el span hacia la derecha */
    font-size: 28px;      /* Ajusta el tamaño del texto o icono de cierre */
    font-weight: bold;
    cursor: pointer; 
    }

    .close:hover,
    .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
    }

    /* Estilos para el formulario y los elementos del formulario */
    label {
    display: block;
    margin-bottom: 10px;
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
        margin-left: -8px; /* Ajusta el espacio entre el botón "Ingresar" y los otros elementos */
    }

    .ingresar-container button {
        padding: 4spx 8px; /* Ajusta el padding del botón "Ingresar" */
    }
</style>
</body>
</html>