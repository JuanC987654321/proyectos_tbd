<?php
require_once 'connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

$conexion = connect_to_db();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Validar que la contraseña cumple con los requisitos
    $passwordPattern = '/^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/';
    if (!preg_match($passwordPattern, $new_password)) {
        echo "<script>alert('La contraseña debe tener al menos 8 caracteres, incluyendo una letra mayúscula y un número.');window.location='../reset_password.php';</script>";
        exit();
    }

    if ($new_password !== $confirm_password) {
        echo "<script>alert('Las contraseñas no coinciden.');window.location='../reset_password.php';</script>";
        exit();
    }

    // Hashear la nueva contraseña
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Actualizar la contraseña en la base de datos
    $stmt = $conexion->prepare("UPDATE account SET Password = ? WHERE ID_Account = ?");
    $stmt->bind_param("si", $hashed_password, $_SESSION['user_id']);
    $stmt->execute();

    // Eliminar la sesión de recuperación
    unset($_SESSION['user_id']);
    unset($_SESSION['username']);
    unset($_SESSION['security_question']);

    echo "<script>alert('Tu contraseña ha sido restablecida correctamente.');window.location='../index.php';</script>";
    $stmt->close();
    $conexion->close();
}
?>
