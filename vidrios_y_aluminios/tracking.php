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
                <td>Abonado</td>
                <td id="abonos">$<?php echo $_COOKIE["abono"] ?></td>
            </tr>
            <tr>
                <td><strong>Saldo pendiente</strong></td>
                <td id="saldoPendiente"><strong>$<?php echo $_COOKIE["precio"] - $_COOKIE["abono"] ?></strong></td>
            </tr>
        </table>
        
        <div class="progress">
            <div class="progress-bar">50%</div>
        </div>

        <br>
        <img src="./images/ImgServicios/<?php echo $_COOKIE['folio'] ?>.jpg" alt="Imagen de tu pedido" style="max-width: 100%; margin-top: 20px;">
        <br>

        <?php
        if ($_COOKIE["OrderStatus"] == "Completado"){

            // formulario del primer parametro a calificar
            echo '<form id="rating-formA">';
                echo '<div class="star-rating">';
                    echo '<fieldset>';
                    echo '<legend>RankingA</legend>';        
                    echo '<input type="hidden" name="folio" value="' . $_COOKIE["folio"] . '">';
                    echo '<input type="radio" id="5-starsA" name="rating" value="5" />';
                    echo '<label for="5-starsA">&#9733;</label>';
                    echo '<input type="radio" id="4-starsA" name="rating" value="4" />';
                    echo '<label for="4-starsA">&#9733;</label>';
                    echo '<input type="radio" id="3-starsA" name="rating" value="3" />';
                    echo '<label for="3-starsA">&#9733;</label>';
                    echo '<input type="radio" id="2-starsA" name="rating" value="2" />';
                    echo '<label for="2-starsA">&#9733;</label>';
                    echo '<input type="radio" id="1-starA" name="rating" value="1" />';
                    echo '<label for="1-starA">&#9733;</label>';
                echo '</fieldset>';
            echo '</div>';
            echo '</form>';

            //segundo parametro
            echo '<form id="rating-formB">';
                echo '<div class="star-rating">';
                    echo '<fieldset>';
                    echo '<legend>RankingB</legend>';
                    

                    echo '<input type="hidden" name="folio" value="' . $_COOKIE["folio"] . '">';
                    echo '<input type="radio" id="5-starsB" name="rating" value="5" />';
                    echo '<label for="5-starsB">&#9733;</label>';
                    echo '<input type="radio" id="4-starsB" name="rating" value="4" />';
                    echo '<label for="4-starsB">&#9733;</label>';
                    echo '<input type="radio" id="3-starsB" name="rating" value="3" />';
                    echo '<label for="3-starsB">&#9733;</label>';
                    echo '<input type="radio" id="2-starsB" name="rating" value="2" />';
                    echo '<label for="2-starsB">&#9733;</label>';
                    echo '<input type="radio" id="1-starB" name="rating" value="1" />';
                    echo '<label for="1-starB">&#9733;</label>';
                echo '</fieldset>';
            echo '</div>';





            echo '</form>';

            //tercer parametro
            echo '<form id="rating-formC">';
                echo '<div class="star-rating">';
                    echo '<fieldset>';
                    echo '<legend>RankingC</legend>';
                    

                    echo '<input type="hidden" name="folio" value="' . $_COOKIE["folio"] . '">';
                    echo '<input type="radio" id="5-starsC" name="rating" value="5" />';
                    echo '<label for="5-starsC">&#9733;</label>';
                    echo '<input type="radio" id="4-starsC" name="rating" value="4" />';
                    echo '<label for="4-starsC">&#9733;</label>';
                    echo '<input type="radio" id="3-starsC" name="rating" value="3" />';
                    echo '<label for="3-starsC">&#9733;</label>';
                    echo '<input type="radio" id="2-starsC" name="rating" value="2" />';
                    echo '<label for="2-starsC">&#9733;</label>';
                    echo '<input type="radio" id="1-starC" name="rating" value="1" />';
                    echo '<label for="1-starC">&#9733;</label>';
                echo '</fieldset>';
            echo '</div>';


            



            echo '</form>';
        }
        ?>
        
        <div style="text-align: center;">
            <form action="php/download_file.php" method="get">
                <input type="hidden" name="column" value="Quotation">
                <input type="hidden" name="ID_Process" value=<?php echo $_COOKIE["idProc"] ?>>
                <button type="submit">Bajar cotización</button>
            </form>

            <form action="php/download_file.php" method="get">
                <input type="hidden" name="column" value="Statement_of_account">
                <input type="hidden" name="ID_Process" value=<?php echo $_COOKIE["idProc"] ?>>
                <button type="submit">Estado de cuenta</button>
            </form>

        </div>
        
    </div>
</body>
    <script src="js/Cliente.js"></script>
    <script src="js/ratingA.js"></script>
    <script src="js/ratingB.js"></script>
    <script src="js/ratingC.js"></script>
</body>
</html>