<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>PAGINA DE RASTREO</title>
</head>
<body>
    <h1>RASTREO DE PEDIDOS</h1>
    <div>
        <table>
            <tr>
                <td><p>Hola <?php echo $_COOKIE["fullname"] ?>!</p></td> 
            </tr>
            <tr>
                <td>Estado: </td>
                <td><?php echo $_COOKIE["status"] ?></td>
            </tr>
            <tr>
                <td>
                    <?php
                    $s = $_COOKIE["status"];
                    $imagenes = array("images/ph_barra1.png", "images/ph_barra2.png", "images/ph_barra3.png", "images/ph_barra4.png");
                    if(strcmp($s, "Pending") == 0){
                        echo '<img src="' . $imagenes[0] . '" alt="">';
                    }
                    if(strcmp($s, "In process") == 0){
                        echo '<img src="' . $imagenes[1] . '" alt="">';
                    }
                    if(strcmp($s, "Sent to") == 0){
                        echo '<img src="' . $imagenes[2] . '" alt="">';
                    }
                    if(strcmp($s, "Completed") == 0){
                        echo '<img src="' . $imagenes[3] . '" alt="">';
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Cantidad: </td>
                <td>N/A</td>
            </tr>
            <tr>
                <td>Medidas: </td>
                <td><?php echo $_COOKIE["width"]?> cm de ancho por <?php echo $_COOKIE["length"]?> cm de largo</td>
            </tr>
            <tr>
                <td>Abono: </td>
                <td><?php echo $_COOKIE["advance_payment"] ?> / <?php echo $_COOKIE["price"] ?></td>
            </tr>
        </table>
        <hr>
        <table>
            <tr>
                <td>Material: </td>
                <td><?php echo $_COOKIE["material"] ?></td>
            </tr>
            <tr>
                <td>Color: </td>
                <td><?php echo $_COOKIE["color"] ?></td>
            </tr>
            <tr>
                <td>Tipo: </td>
                <td><?php echo $_COOKIE["type"] ?></td>
            </tr>
            <tr>
                <td>Descripcion: </td>
                <td><?php echo $_COOKIE["description"] ?></td>
            </tr>
            <tr>
                <td>Largo: </td>
                <td><?php echo $_COOKIE["length"] ?></td>
            </tr>
            <tr>
                <td>Ancho: </td>
                <td><?php echo $_COOKIE["width"] ?></td>
            </tr>
        </table>
        <hr>
        <button type="submit" name="boton" id="botonRandom">Bajar cotizacion</button>
    </div>
    <script>
        var boton = document.getElementById("botonRandom");
        boton.addEventListener("click", function() {
            alert("¡Aun no implementado!\n\n\n:D");
        });
    </script>
</body>
