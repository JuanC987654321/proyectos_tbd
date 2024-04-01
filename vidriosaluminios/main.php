<?php 

require_once "php/s_status.php";

session_start();
if(!isset($_SESSION["id_staff"])) {
    echo "<script>alert('NO SE A ACCEDIDO A ESTA PAGINA DE MANERA CORRECTA, SERA REDIRECCIONADO A LA PAGINA DE INICIO DE SESION');window.location='login.html';</script>";
}
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>PAGINA PRINCIPAL</title>
</head>
<body>
    <h1>PAGINA PRINCIPAL</h1>

    <form action="php/logout.php" method="post">
        <div>
            <button type="submit" name="enviar">Cerrar Sesion</button>
        </div>
    </form>


    <table>
        <tr>
            <td>ID:</td>
            <td><?php echo $_SESSION["id_staff"] ?></td>
        </tr>
        <tr>
            <td>Nombre de usuario: </td>
            <td><?php echo $_SESSION["username"] ?></td>
        </tr>
        <tr>
            <td>Nombre: </td>
            <td><?php echo $_SESSION["Name"] ?></td>
        </tr>
        <tr>
            <td>Apellido: </td>
            <td><?php echo $_SESSION["Last_name"] ?></td>
        </tr>
        <tr>
            <td>Rol: </td>
            <td><?php echo $_SESSION["Role"] ?></td>
        </tr>
    </table>
    <hr>

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
            <legend>Edicion de pedido (de momento solo busca el pedido igual que seria buscarlo mediante la pagina de busqueda pero mas adelante podria llevar a una pagina que permita editar algunos parametros del pedido)</legend>
            <div>
                <div>
                    <label for="">Folio:</label>
                    <input type="text" placeholder="folio" name="folio">
                    <button type="submit" name="enviar">Buscar</button>
                </div>
        </fieldset>
    </form>


    <ul>
        <li>Pendientes
            <ul>
                <?php buscar_por_status("Pending"); ?>
            </ul>
        </li>
        <li>En proceso
            <ul>
                <?php buscar_por_status("In process"); ?>
            </ul>
        </li>
        <li>Enviados
            <ul>
                <?php buscar_por_status("Sent to"); ?>
            </ul>
        </li>
        <li>Completados
            <ul>
                <?php buscar_por_status("Completed"); ?>
            </ul>
        </li>
        <li>Cancelados
            <ul>
                <?php buscar_por_status("Cancelled"); ?>
            </ul>
        </li>
    </ul>

    
</body>