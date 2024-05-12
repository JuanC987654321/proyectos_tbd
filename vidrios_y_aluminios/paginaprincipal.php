<?php
// require_once "php/auth.php";
?>

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
<?php
require_once "php/barraLateral.php";
?>


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