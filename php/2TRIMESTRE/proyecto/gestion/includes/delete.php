<?php 
session_start(); // Inicia la sesión al principio del archivo

if (($_SESSION['rol'] != 'administrador' && $_SESSION['rol'] != 'direccion')) {
    header("Location: login.php"); 
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
         echo "<script>window.location='admin_page.php';</script>"; 
     }
?>
<?php include "../footer.php" ?>