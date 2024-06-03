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
    <script src="js/fetchClientName.js"></script>
    
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
                <!-- <input type="hidden" name="param2" value=""> -->
                <input type="submit" class="btn btn-primary" value="Buscar"></input>
            </form>




            <?php
            
            if ((isset($_GET["fecha_inicio"]) || (isset($_GET['status'])) && $_GET['status'] == "Completado")) {
                echo '<form action="php/s_trab_serv.php" method="GET">';
                    echo '<input type="hidden" name="accion" value="buscar_por_fechas">';
                    echo '<label for="fecha_inicio">Fecha de Inicio:</label>';
                    echo '<input type="date" id="param" name="param" required>';
                    echo '<label for="fecha_final">Fecha Final:</label>';
                    echo '<input type="date" id="param2" name="param2" required>';
                    echo '<input type="submit" value="Filtrar" class="btn btn-primary"></input>';
                echo '</form>';
            }
            ?>
                


            <form action="php/s_trab_serv.php" method="get" class="inline-form">
                <input type="hidden" name="accion" value="buscar_por_status">
                <!-- <input type="submit" name="param" value="En proceso" class="btn btn-primary">En proceso</input> -->
                <input type="hidden" name="param2" value="">
                <input type="submit" name="param" value="Completado" class="btn btn-primary"></input>
            </form>

            <?php
            
            if (isset($_GET['status']) && $_GET['status'] != "Completado") {
                echo "<div class=\"ingresar-container\">";
                    echo "<button id=\"ingresarBtn\" class=\"btn btn-primary\">Ingresar</button> <!-- Botón \"Ingresar\" -->";
                echo "</div>";
            }
            ?>
        </div>
    </div>
    <div id="productList">
        <?php 
            if (isset($_GET['status']) && !isset($_GET["fecha_inicial"])) {
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
            else if (isset($_GET["fecha_inicio"]) && isset($_GET["fecha_final"])){
                $i = $_GET["fecha_inicio"];
                $f = $_GET["fecha_final"];

                // buscar_con_status();
                buscar_con_fechas($i, $f);
            }
            // else {
            //     buscar_todos();
            // }
        ?>
    </div>
</main>



<!-- MODAL INFO -->
<!-- Modal -->
<div id="modalInfo" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div>
            <label>Nombre del Cliente: <span id="nomb">$nombre</span></label>
        </div>

        <div>
            <label>Folio: <span id="fol">$folio</span></label>
        </div>

        <div>
            <label>Status: <span id="stat">$status</span></label>
        </div>

        <div>
            <label>Numero del Cliente: <span id="numCli">$numeroCliente</span></label>
        </div>

        <div>
            <label>Precio: $<span id="prec">$precio</span></label>
        </div>

        <div>
            <label>Total abonado: $<span id="abon">$abono</span></label>
        </div>
        <hr>

        <!-- <form action="" method="post">
            <div>
                <label for="abono">Editar precio:</label>
                <input type="number" step=0.01 id="abono" name="abono" required>
            </div>
            <button type="submit" class="btn btn-primary">Aceptar</button>
            <br><br>
        </form> -->
        
        <form action="php/upload_image.php" method="post" enctype="multipart/form-data">
            <div>
                <span></span>
                <label for="imgServ">Subir imagen:</label>
                <input type="hidden" name="folio" id="folImg">
                <input type="file" id="imgServ" name="imgServ" accept="image/*"><br>
                <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </form>

        <hr>
        <form action="php/upload_estadoCuenta.php" method="post" enctype="multipart/form-data">
            <div>
                <input type="hidden" name="folio" id="folSoA">
                <label for="SoA">Subir estado de cuenta:</label>
                <input type="file" id="SoA" name="SoA" accept="application/pdf" required><br>
                <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </form>
        
        <hr>
        <form action="php/abonar.php" method="post">
            <div>
                <label for="abono">Dar abono:</label>
                <input type="hidden" name="folio" id="folAbon">
                <input type="hidden" name="abonado" id="totAbon">
                <input type="number" id="cantAbon" step=0.01 id="abono" name="abono" min="0" value="0" required>
            </div>
            <button type="submit" class="btn btn-primary">Aceptar</button>
        </form>
        <hr>
        <form action="php/set_estado_servicio.php" method="post">
            <div>
                <Label for="estado">Estado del pedido:</Label>
                <input type="hidden" name="folio" id="folStat">

                <!-- PONER AQUI LOS ESTADOS NUEVOS -->
                <select name="status">
                    <option value="En proceso">En proceso</option>
                    <option value="Completado">Completado</option>
                </select>
                <!--  -->


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
        <form action="php/insert.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="numeroCliente">Numero del Cliente:</label>
                <input type="text" id="numeroCliente" name="numero_cliente" required><br>
            </div>
            <br>
            <div>
                <label for="nombreCliente">Nombre del Cliente:</label>
                <input type="text" id="nombreCliente" name="nombre_cliente" required><br>
            </div>
            <br>
            <div>
                <label for="precio">Precio:</label>
                <input type="number" step=0.01 id="precio" name="precio" required><br>
            </div>
            <br>
            <div>
                <label for="abono">Anticipo:</label>
                <input type="number" step=0.01 id="abono" name="abono" required><br>
            </div>
            <br>
            <!-- <div>
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" required><br>
            </div> -->
            <!-- <div>
                <label for="SoA">Subir estado de cuenta:</label>
                <input type="file" id="SoA" name="SoA" accept="application/pdf" required><br>
            </div> -->

            <div>
                <label for="cotiz">Subir cotizacion:</label>
                <input type="file" id="cotiz" name="cotiz" accept="application/pdf" required><br>
            </div>
            <br>

            <br>
            <button type="submit" class="btn btn-primary">Aceptar</button>
        </form>
    </div>
</div>

<script>
    function abrirModalInfo(nombre, folio, status, numeroCli, precio, abono){
        document.getElementById("modalInfo").style.display = "block";
        
        document.getElementById("nomb").innerHTML = nombre;
        document.getElementById("fol").innerHTML = folio;
        document.getElementById("stat").innerHTML = status;
        document.getElementById("numCli").innerHTML = numeroCli;
        document.getElementById("prec").innerHTML = precio;
        document.getElementById("abon").innerHTML = abono;

        document.getElementById("folAbon").value = folio;
        document.getElementById("folSoA").value = folio;
        document.getElementById("totAbon").value = abono;
        document.getElementById("cantAbon").max = precio - abono;

        document.getElementById("folStat").value = folio;

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

    try{
        // Agregar event listener para abrir el modal cuando se hace clic en el botón "Ingresar"
        document.getElementById('ingresarBtn').addEventListener('click', abrirModal);
    } catch(error){
        
    }
    // Agregar event listener para cerrar el modal cuando se hace clic en el botón de cerrar
    var closeButtons = document.getElementsByClassName('close');
    // Itera sobre todos los elementos y añade el evento 'click' con la función cerrarModal
    for (var i = 0; i < closeButtons.length; i++) {
        closeButtons[i].addEventListener('click', cerrarModal);
        closeButtons[i].addEventListener('click', cerrarModalInfo);
    }
</script>

<script>
    const precioInput = document.getElementById('precio');
    const abonoInput = document.getElementById('abono');

    function updateAbonoMax() {
        const precio = parseFloat(precioInput.value);

        if (!isNaN(precio)) {
            abonoInput.max = precio.toFixed(2);
            abonoInput.value = precio * 0.6;
        } else {
            abonoInput.removeAttribute('max');
        }
    }

    precioInput.addEventListener('input', updateAbonoMax);
    // Inicializar el max del abono en caso de que el precio ya tenga un valor
    updateAbonoMax();
</script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="js/AvoidMultiClick.js"></script>


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