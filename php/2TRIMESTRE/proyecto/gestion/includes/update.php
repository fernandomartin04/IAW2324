<!-- Footer -->
<?php include "../header.php"?>

<?php
   if(isset($_GET['incidencia_id']))
    {
      $incidenciaid = htmlspecialchars($_GET['incidencia_id']); 
    }
      
<<<<<<< HEAD
      $query="SELECT * FROM incidencia WHERE id = $incidenciaid ";
=======
      $query="SELECT * FROM incidencias WHERE id = $incidenciaid ";
>>>>>>> 47c15eb7986fe494d27b90daf9de09d7f29b0fa2
      $vista_incidencias= mysqli_query($conn,$query);

      while($row = mysqli_fetch_assoc($vista_incidencias))
        {
          $id = $row['id'];                
          $planta = $row['planta'];        
          $aula = $row['aula'];         
          $descripcion = $row['descripcion'];        
<<<<<<< HEAD
          $alta = $row['alta'];        
          $revision = $row['revision'];        
          $resolucion = $row['resolucion'];        
=======
          $fecha_alta = $row['fecha_alta'];        
          $fecha_rev = $row['fecha_rev'];        
          $fecha_sol = $row['fecha_sol'];        
>>>>>>> 47c15eb7986fe494d27b90daf9de09d7f29b0fa2
          $comentario = $row['comentario'];
        }
 
    if(isset($_POST['editar'])) 
    {
      $planta = htmlspecialchars($_POST['planta']);
      $aula = htmlspecialchars($_POST['aula']);
      $descripcion = htmlspecialchars($_POST['descripcion']);
<<<<<<< HEAD
      $alta = htmlspecialchars($_POST['alta']);
      $revision = htmlspecialchars($_POST['revision']);
      $resolucion = htmlspecialchars($_POST['resolucion']);
      $comentario = htmlspecialchars($_POST['comentario']);
      $query = "UPDATE incidencia SET planta = '{$planta}' , aula = '{$aula}' , descripcion = '{$descripcion}', alta = '{$alta}', revision = '{$revision}', resolucion = '{$resolucion}', comentario = '{$comentario}' WHERE id = {$id}";
=======
      $fecha_alta = htmlspecialchars($_POST['fecha_alta']);
      $fecha_rev = htmlspecialchars($_POST['fecha_rev']);
      $fecha_sol = htmlspecialchars($_POST['fecha_sol']);
      $comentario = htmlspecialchars($_POST['comentario']);
      $query = "UPDATE incidencias SET planta = '{$planta}' , aula = '{$aula}' , descripcion = '{$descripcion}', fecha_alta = '{$fecha_alta}', fecha_rev = '{$fecha_rev}', fecha_sol = '{$fecha_sol}', comentario = '{$comentario}' WHERE id = {$id}";
>>>>>>> 47c15eb7986fe494d27b90daf9de09d7f29b0fa2
      $incidencia_actualizada = mysqli_query($conn, $query);
      if (!$incidencia_actualizada)
        echo "Se ha producido un error al actualizar la incidencia.";
      else
        echo "<script type='text/javascript'>alert('¡Datos de la incidencia actualizados!')</script>";
    }             
?>
<<<<<<< HEAD
<?php $fecha = date("Y-m-d");?>
<h1 class="text-center">Actualizar incidencia</h1>
  <div class="container ">
    <form action="" method="post">
    <div class="form-group">
        <label for="planta" class="form-label">Planta</label>
        <select name="planta"  class="form-control">
          <option value="baja">Planta Baja</option>
          <option value="primera">Planta Primera</option>
          <option value="segunda">Planta Segunda</option>
        </select>
=======

<h1 class="text-center">Actualizar incidencia</h1>
  <div class="container ">
    <form action="" method="post">
      <div class="form-group">
        <label for="planta" >Planta</label>
        <input type="text" name="planta" class="form-control" value="<?php echo $planta  ?>">
>>>>>>> 47c15eb7986fe494d27b90daf9de09d7f29b0fa2
      </div>
      <div class="form-group">
        <label for="aula" >Aula</label>
        <input type="text" name="aula" class="form-control" value="<?php echo $aula  ?>">
      </div>
      <div class="form-group">
        <label for="descripcion" >Descripción</label>
        <input type="text" name="descripcion" class="form-control" value="<?php echo $descripcion  ?>">
      </div>
      <div class="form-group">
<<<<<<< HEAD
        <label for="alta" class="form-label">Fecha Alta</label>
        <input type="date" name="alta"  class="form-control" value="<?php echo $fecha; ?>">
      </div>
      <div class="form-group">
        <label for="revision" >Fecha revisión</label>
        <input type="date" name="revision" class="form-control" value="<?php echo $revision  ?>">
      </div>
      <div class="form-group">
        <label for="resolucion" >Fecha solución</label>
        <input type="date" name="resolucion" class="form-control" value="<?php echo $resolucion  ?>">
=======
        <label for="fecha_alta" >Fecha alta</label>
        <input type="date" name="fecha_alta" class="form-control" value="<?php echo $fecha_alta  ?>">
      </div>
      <div class="form-group">
        <label for="fecha_rev" >Fecha revisión</label>
        <input type="date" name="fecha_rev" class="form-control" value="<?php echo $fecha_rev  ?>">
      </div>
      <div class="form-group">
        <label for="fecha_sol" >Fecha solución</label>
        <input type="date" name="fecha_sol" class="form-control" value="<?php echo $fecha_sol  ?>">
>>>>>>> 47c15eb7986fe494d27b90daf9de09d7f29b0fa2
      </div>
      <div class="form-group">
        <label for="comentario" >Comentario</label>
        <input type="text" name="comentario" class="form-control" value="<?php echo $comentario  ?>">
      </div>
      <div class="form-group">
         <input type="submit"  name="editar" class="btn btn-primary mt-2" value="editar">
      </div>
    </form>    
  </div>

    <div class="container text-center mt-5">
      <a href="home.php" class="btn btn-warning mt-5"> Volver </a>
    <div>

<?php include "../footer.php" ?>