<?php 
session_start(); // Inicia la sesión al principio del archivo

// Compruebo si es administrador
if (($_SESSION['rol'] != 'administrador')) {
    header("Location: login.php"); 
    exit();
}
?>
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


