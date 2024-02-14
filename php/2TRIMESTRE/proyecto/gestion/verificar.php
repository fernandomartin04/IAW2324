<?php session_start();
    // Verifica si el usuario no ha iniciado sesión
    if (!isset($_SESSION['usuario'])) {
        header("Location: login.php");
        exit();
    }
?>