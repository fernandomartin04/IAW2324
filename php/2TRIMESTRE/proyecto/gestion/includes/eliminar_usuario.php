<?php 
session_start(); // Inicia la sesión al principio del archivo
//Compruebo si es administrador
    if ($_SESSION['rol'] != 'administrador') {
        header("Location: login.php"); 
        exit();
    }
?>
<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Obtengo el id_usuario almacenado en la sesión
        $idUsuarioSesion = $_SESSION['id_usuario'];

        if ($id == $idUsuarioSesion) {
            echo "No puedes eliminar tu propio usuario.";
            header("Location: panel_admin.php");
            exit();
        } else {
            // Continuo con la eliminación
            if ($conn) {
                $query = "DELETE FROM usuarios WHERE id_usuario = $id";

                if (mysqli_query($conn, $query)) {
                    header("Location: panel_admin.php");
                    exit();
                } else {
                    echo "Error al eliminar el usuario: " . mysqli_error($conn);
                }
            } else {
                echo "Error: No se pudo conectar a MySQL.";
            }
        }
    }
?>

