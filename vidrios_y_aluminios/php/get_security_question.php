<?php
require_once 'connect.php';
$conexion = connect_to_db();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];

    // Verificar si el nombre de usuario existe y obtener la pregunta de seguridad
    $stmt = $conexion->prepare("SELECT security_question FROM account WHERE Registered_Account = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($security_question);
        $stmt->fetch();
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['security_question'] = $security_question;
        header("Location: ../answer_security_question.php");
        exit();
    } else {
        echo "<script>alert('Nombre de usuario no encontrado');window.location='../forgot_password.php';</script>";
    }
    $stmt->close();
    $conexion->close();
}
?>
