<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vidrios y Aluminios Armando</title>
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
    <section id="contenedorfpp">
        <img id="fondopp" src="images/fondo.png" alt="Fondo" >
    
        <form action="php/insert.php" method="post">
            <fieldset>
                <legend>Crear pedido</legend>
                <div>
                    <div>
                        <label for="">tabla customer:</label>
                        <input required type="text" placeholder="nombre" name="name">
                        <input required type="text" placeholder="apellido" name="last_name">
                        <input required type="text" placeholder="numero telefonico" name="telephone_number" maxlength="10">
                        <input required type="text" placeholder="direccion" name="address">
                        <input required type="text" placeholder="correo electronico" name="email">
                        <hr>
                    </div>
                    <div>
                        <label for="">tabla product:</label>
                        <input required type="text" placeholder="material" name=material>
                        <input required type="text" placeholder="color" name="color">
                        <input required type="text" placeholder="tipo" name="type">
                        <input required type="text" placeholder="descripcion" name="description">
                        <input required type="number" placeholder="largo" name="length" step="0.1" min="0.1">
                        <input required type="number" placeholder="ancho" name="width" step="0.1" min="0.1">
                        <hr>
                    </div>


                    <!-- de momento folio es ingresado por el administrador pero 
                    seria mejor generarlo algoritmicamente -->
                    <div>
                        <label for="">tabla buy:</label>
                        <input required type="text" placeholder="Folio" name="folio">
                        <input required type="number" placeholder="precio" name="price" step="0.01" min="0.1">
                        <input required type="number" placeholder="anticipo" name="advance_payment" step="0.1" min="0">
                        <hr>
                    </div>
                </div>
                <div>
                    <button type="submit" name="enviar">Crear</button>
                </div>
            </fieldset>
        </form>




        <form action="php/s_folio.php" method="post">
            <fieldset>
                <!-- <legend>Edicion de pedido (de momento solo busca el pedido igual que seria buscarlo mediante la pagina de busqueda pero mas adelante podria llevar a una pagina que permita editar algunos parametros del pedido)</legend> -->
                <div>
                    <div>
                        <label for="">Folio:</label>
                        <input type="text" placeholder="folio" name="folio">
                        <button type="submit" name="enviar">Buscar</button>
                    </div>
            </fieldset>
        </form>
    </section>
</main>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="js/script.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>