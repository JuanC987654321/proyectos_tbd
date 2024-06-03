<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link href="styles/Estilo.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800&display=swap" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="form-container">
        <form action="php/get_security_question.php" method="post" class="login-form">
            <h2>Recuperar Contraseña</h2>
            <div class="formulario">
                <label class="label" for="username">Nombre de Usuario:</label>
                <input required type="text" name="username" id="username" placeholder="Ingrese su usuario">
                <input type="submit" value="Verificar">
            </div>
        </form>
    </div>
</div>

</body>
</html>
