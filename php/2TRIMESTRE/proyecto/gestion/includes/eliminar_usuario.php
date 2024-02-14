<?php 
session_start(); // Inicia la sesión al principio del archivo

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php"); // Redirige al usuario a la página de inicio de sesión si no ha iniciado sesión
    exit();
}
include "../header.php"; ?>
<?php
if(isset($_GET['id'])) {
    
    if($conn) {
        $id = $_GET['id'];
        
        $query = "DELETE FROM usuarios WHERE id_usuario = $id";
        
        if(mysqli_query($conn, $query)) {
            header("Location: panel_admin.php");
            exit();
        } else {
            echo "Error al eliminar el usuario: " . mysqli_error($conn);
        }
    } else {
        echo "Error: No se pudo conectar a MySQL.";
    }
}
?>
