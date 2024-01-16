<?php include "../header.php" ?>
<?php 
     if(isset($_GET['eliminar']))
     {
         $id= htmlspecialchars($_GET['eliminar']);
<<<<<<< HEAD
         $query = "DELETE FROM incidencia WHERE id = {$id}"; 
=======
         $query = "DELETE FROM incidencias WHERE id = {$id}"; 
>>>>>>> 47c15eb7986fe494d27b90daf9de09d7f29b0fa2
         $delete_query= mysqli_query($conn, $query);
         // header("Location: home.php");
         echo "<script>window.location='home.php';</script>";
     }
?>
<?php include "../footer.php" ?>