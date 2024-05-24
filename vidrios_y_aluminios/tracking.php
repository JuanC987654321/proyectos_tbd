<?php
require_once "php/get_datetime_from_folio.php"
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/Cliente.css">
    <title>Progreso de pedido</title>


</head>


<body>
    <div class="container">
        <h1>Estatus de pedido</h1>
        <p>Hola <?php echo $_COOKIE["nombre"] ?>!</p>
        <p><strong>Estado:</strong> <?php echo $_COOKIE["OrderStatus"] ?></p>
        <p><strong>Folio:</strong> <span id="folio"><?php echo $_COOKIE["folio"] ?></span></p>
        <p><strong>Fecha del Pedido:</strong> <span id="fechaPedido"><?php echo convertirFechaHora($_COOKIE["folio"]) ?></span></p>
        <!-- <div class="progress">
            <div class="progress-bar">50%</div>
        </div> -->
        <h2>Resumen del servicio</h2>
        <table class="price-table">
            <tr>
                <th>Concepto</th>
                <th>Monto</th>
            </tr>
            <tr>
                <td>Total del servicio</td>
                <td id="totalServicio">$<?php echo $_COOKIE["precio"] ?></td>
            </tr>
            <tr>
                <td>Abonos</td>
                <td id="abonos">$<?php echo $_COOKIE["abono"] ?></td>
            </tr>
            <tr>
                <td><strong>Saldo pendiente</strong></td>
                <td id="saldoPendiente"><strong>$<?php echo $_COOKIE["precio"] - $_COOKIE["abono"] ?></strong></td>
            </tr>
        </table>
        <br>
        <img src="ruta_a_tu_imagen.jpg" alt="Imagen de tu pedido" style="max-width: 100%; margin-top: 20px;">
        <br>

        <?php
        if ($_COOKIE["OrderStatus"] == "Completado"){
            echo '<form id="rating-form">';
                echo '<div class="star-rating">';
                    echo '<input type="hidden" name="folio" value="' . $_COOKIE["folio"] . '">';
                    echo '<input type="radio" id="5-stars" name="rating" value="5" />';
                    echo '<label for="5-stars">&#9733;</label>';
                    echo '<input type="radio" id="4-stars" name="rating" value="4" />';
                    echo '<label for="4-stars">&#9733;</label>';
                    echo '<input type="radio" id="3-stars" name="rating" value="3" />';
                    echo '<label for="3-stars">&#9733;</label>';
                    echo '<input type="radio" id="2-stars" name="rating" value="2" />';
                    echo '<label for="2-stars">&#9733;</label>';
                    echo '<input type="radio" id="1-star" name="rating" value="1" />';
                    echo '<label for="1-star">&#9733;</label>';
                echo '</div>';
            echo '</form>';
        }
        ?>
        
        <div style="text-align: center;">
            <button onclick="bajarCotizacion()">Bajar cotización</button>
            <button onclick="estadoCuenta()">Estado de cuenta</button>
        </div>
        
    </div>
</body>
    <script src="js/Cliente.js"></script>
    <script src="js/rating.js"></script>
</body>
</html>