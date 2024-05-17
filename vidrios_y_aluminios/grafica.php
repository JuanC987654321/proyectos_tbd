<?php
require_once "php/auth.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graficas</title>
    <link href="styles/style.css" rel="stylesheet">
    <link href="styles/Graficas.css" rel="stylesheet">
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
    <h1>Ventas de Productos Más Vendidos</h1>
    <canvas id="salesChart" width="400" height="200"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="script.js"></script>
</main>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="js/script.js"></script>

<?php
    echo "<script src='js/Graficas.js'></script>"
?>

<script type="text/javascript">
        // Llamar a la función JavaScript pasando los datos desde PHP
        // aqui cambiar los numeros por lo que se lea de la base de datos
        document.addEventListener("DOMContentLoaded", function() {
            dibujarGrafica(
                <?php echo rand(0, 120); ?>,
                <?php echo rand(0, 80); ?>,
                <?php echo rand(0, 30); ?>,
                <?php echo rand(0, 10); ?>,
                <?php echo rand(0, 5); ?>
            );
        });
    </script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>