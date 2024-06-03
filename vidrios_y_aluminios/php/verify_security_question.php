<?php
require_once 'connect.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}

$conexion = connect_to_db();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION['username'];
    $security_answer = $_POST['security_answer'];

    // Verificar si la respuesta de seguridad es correcta
    $stmt = $conexion->prepare("SELECT ID_Account FROM account WHERE Registered_Account = ? AND security_answer = ?");
    $stmt->bind_param("ss", $username, $security_answer);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id);
        $stmt->fetch();
        $_SESSION['user_id'] = $user_id;
        header("Location: ../reset_password.php");
        exit();
    } else {
        echo "<script>alert('Respuesta de seguridad incorrecta');window.location='../answer_security_question.php';</script>";
    }
    $stmt->close();
    $conexion->close();
}
?>
