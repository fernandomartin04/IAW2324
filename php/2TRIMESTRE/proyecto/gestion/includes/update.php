<!-- Footer -->
<?php include "../header.php"?>

<?php
   if(isset($_GET['incidencia_id']))
    {
      $incidenciaid = htmlspecialchars($_GET['incidencia_id']); 
    }
      
      $query="SELECT * FROM incidencia WHERE id = $incidenciaid ";
      $vista_incidencias= mysqli_query($conn,$query);

      while($row = mysqli_fetch_assoc($vista_incidencias))
        {
          $id = $row['id'];                
          $planta = $row['planta'];        
          $aula = $row['aula'];         
          $descripcion = $row['descripcion'];        
          $alta = $row['alta'];        
          $revision = $row['revision'];        
          $resolucion = $row['resolucion'];        
          $comentario = $row['comentario'];
        }
 
    if(isset($_POST['editar'])) 
    {
      $planta = htmlspecialchars($_POST['planta']);
      $aula = htmlspecialchars($_POST['aula']);
      $descripcion = htmlspecialchars($_POST['descripcion']);
      $alta = htmlspecialchars($_POST['alta']);
      $revision = htmlspecialchars($_POST['revision']);
      $resolucion = htmlspecialchars($_POST['resolucion']);
      $comentario = htmlspecialchars($_POST['comentario']);
      $query = "UPDATE incidencia SET planta = '{$planta}' , aula = '{$aula}' , descripcion = '{$descripcion}', alta = '{$alta}', revision = '{$revision}', resolucion = '{$resolucion}', comentario = '{$comentario}' WHERE id = {$id}";
      $incidencia_actualizada = mysqli_query($conn, $query);
      if (!$incidencia_actualizada)
        echo "Se ha producido un error al actualizar la incidencia.";
      else
        echo "<script type='text/javascript'>alert('¡Datos de la incidencia actualizados!')</script>";
    }             
?>
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