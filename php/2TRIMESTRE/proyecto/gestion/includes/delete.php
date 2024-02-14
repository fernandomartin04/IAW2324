<?php 
session_start(); // Inicia la sesión al principio del archivo

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php"); // Redirige al usuario a la página de inicio de sesión si no ha iniciado sesión
    exit();
}
include "../header.php" ?>
<?php 
     if(isset($_GET['eliminar']))
     {
         $id= htmlspecialchars($_GET['eliminar']);
         $query = "DELETE FROM incidencias WHERE id = {$id}"; 
         $delete_query= mysqli_query($conn, $query);
         // header("Location: home.php");
         echo "<script>window.location='admin_page.php';</script>"; //hay que hacer algo para que no mande ahí, sino los usuarios pueden borrar
     }
?>
<?php include "../footer.php" ?>