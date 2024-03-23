

<!DOCTYPE html>
<head>
    <title>PAGINA DE RASTREO</title>
</head>
<body>
    <h1>RASTREO DE PEDIDOS</h1>
        <div>
            <table>
                <tr>
                    <td>numero de folio: </td>
                    <td><?php echo $_COOKIE["folio"] ?></td>
                </tr>
                <tr>
                    <td>estatus del pedido: </td>
                    <td><?php echo $_COOKIE["status"] ?></td>
                </tr>
                <tr>
                    <td>precio: </td>
                    <td><?php echo $_COOKIE["price"] ?></td>
                </tr>
                <tr>
                    <td>abono: </td>
                    <td><?php echo $_COOKIE["advance_payment"] ?></td>
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
            <button>Bajar cotizacion</button>
        </div>
</body>