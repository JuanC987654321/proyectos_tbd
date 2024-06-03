<?php
session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['security_question'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responder Pregunta de Seguridad</title>
    <link href="styles/Estilo.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800&display=swap" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="form-container">
        <form action="php/verify_security_question.php" method="post" class="login-form">
            <h2>Responder Pregunta de Seguridad</h2>
            <div class="formulario">
                <label class="label" for="security_question"><?php echo $_SESSION['security_question']; ?></label>
                <input required type="text" name="security_answer" id="security_answer" placeholder="Ingrese su respuesta">
                <input type="submit" value="Verificar">
            </div>
        </form>
    </div>
</div>

</body>
</html>
