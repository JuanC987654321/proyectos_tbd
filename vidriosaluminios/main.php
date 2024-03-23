<?php 
session_start();
if(!isset($_SESSION["id_staff"])) {
    echo "NO SE A INICIADO SESION";
    //todo
    //enviar de vuelta al index, no mostrar la pagina llena de errores
}
?>

<!DOCTYPE html>
<head>
    <title>PAGINA PRINCIPAL</title>
</head>
<body>
    <h1>PAGINA PRINCIPAL</h1>
        <form action="php/logout.php" method="post">
            <div>
                <button type="submit" name="enviar">Cerrar Sesion</button>
            </div>
        </form>
        <div>
            <table>
                <tr>
                    <td>nombre de usuario: </td>
                    <td><?php echo $_SESSION["username"] ?></td>
                </tr>
                <tr>
                    <td>nombre: </td>
                    <td><?php echo $_SESSION["Name"] ?></td>
                </tr>
                <tr>
                    <td>apellido: </td>
                    <td><?php echo $_SESSION["Last_name"] ?></td>
                </tr>
                <tr>
                    <td>rol: </td>
                    <td><?php echo $_SESSION["Role"] ?></td>
                </tr>
            </table>
        </div>
</body>