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
        <h1>¿Cómo va tu pedido?</h1>
        <p>Hola <?php echo $_COOKIE["fullname"] ?>!</p>
        <p><strong>Estado:</strong> <?php echo $_COOKIE["status"] ?></p>
        <p><strong>Folio:</strong> <span id="folio"><?php echo $_COOKIE["folio"] ?></span></p>
        <p><strong>Fecha del Pedido:</strong> <span id="fechaPedido"></span></p>
        <div class="progress">
            <div class="progress-bar">50%</div>
        </div>
        <img src="ruta_a_tu_imagen.jpg" alt="Imagen de tu pedido" style="max-width: 100%; margin-top: 20px;">
        <button onclick="bajarCotizacion()">Bajar cotización</button>
    </div>
</body>










    <script src="js/Cliente.js"></script>
</body>
</html>