<?php
require_once "php/s_buscar.php"
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

<div class="menu">
    <ion-icon name="menu-outline"></ion-icon>
    <ion-icon name="close-outline"></ion-icon>
</div>
    

<div class="barra-lateral">
    
    <div>
        <div class="nombre-pagina">
            <a href="paginaprincipal.php">
                <img id="logomini" src="images/logo.png" alt="Logo">
            </a>
        </div>
    </div>

    <nav class="navegacion">
        <ul>
            <li>
                <a id="inbox" href="procesos.php">
                    <ion-icon name="reload-circle-outline"></ion-icon>
                    <span >Procesos</span>
                </a>
            </li>
            <li>
                <a href="grafica.html">
                    <ion-icon name="stats-chart-outline"></ion-icon>
                    <span>Gráficas</span>
                </a>
            </li>
            <li>
                <a href="ventas.html">
                    <ion-icon name="wallet-outline"></ion-icon>
                    <span>Ventas</span>
                </a>
            </li>
            <li>
                <a href="usuario.php">
                    <ion-icon name="person-outline"></ion-icon>
                    <span>Usuario</span>
                </a>
            </li>
        </ul>
    </nav>

    <div>
        <div class="linea"></div>

        <div class="modo-oscuro">
            <div class="info">
                <ion-icon name="moon-outline"></ion-icon>
                <span>Drak Mode</span>
            </div>
            <div class="switch">
                <div class="base">
                    <div class="circulo">
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="usuario">
            <img src="/Jhampier.jpg" alt="">
            <div class="info-usuario">
                <div class="nombre-email">
                    <span class="nombre">Armando</span>
                    <span class="email">Vidrios_aluminios@gmail.com</span>
                </div>
                <ion-icon name="ellipsis-vertical-outline"></ion-icon>
            </div>
        </div>
    </div>

</div>
<main>
    <h1>Historial de Productos</h1>
    <?php buscar_todos() ?>
</main>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="js/script.js"></script>
</body>
</html>