<?php
session_start();

if ($_SESSION['rol'] != 'administrador') {
    header("Location: login.php");
    exit();
}

include "../header.php";

if (isset($_POST['id'])) {
    if ($conn) {
        $id = $_POST['id'];

        $queryObtenerUsuario = "SELECT * FROM usuarios WHERE id_usuario = $id";
        $resultado = mysqli_query($conn, $queryObtenerUsuario);

        if ($resultado && mysqli_num_rows($resultado) != false) {
            $usuario = mysqli_fetch_assoc($resultado);

            // Eliminar las incidencias asociadas al usuario
            $nombreUsuario = $usuario['usuario']; // Utilizamos el nombre de usuario obtenido
            $queryEliminarIncidencias = "DELETE FROM incidencias WHERE user = '$nombreUsuario'";
            mysqli_query($conn, $queryEliminarIncidencias);

            // Ahora eliminar el usuario
            $queryEliminarUsuario = "DELETE FROM usuarios WHERE id_usuario = $id";
            if (mysqli_query($conn, $queryEliminarUsuario)) {
                header("Location: panel_admin.php");
                exit();
            } else {
                echo "Error al eliminar el usuario: " . mysqli_error($conn);
            }
        } else {
            echo "Error al obtener información del usuario.";
        }
    } else {
        echo "Error: No se pudo conectar a MySQL.";
    }
}
?>
