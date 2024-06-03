<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rastrear Servicio</title>
    <link href="styles/rastrear.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="login-container">
    <form action="php/s_cli_folio.php" method="post" class="login-form">
        <img class="logo" src="images/logo.png" alt="Foto del logo">
        <fieldset>
            <label class="label">NÚMERO DE FOLIO:</label>
            <input type="text" id="text" name="search_field" required placeholder="Número de FOLIO">
            <input type="submit" value="Ingresar">
        </fieldset>
    </form>
</div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
