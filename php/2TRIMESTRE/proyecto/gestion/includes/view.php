<?php  include '../header.php'?>

<h1 class="text-center">Detalles de incidencia</h1>
  <div class="container">
    <table class="table table-striped table-bordered table-hover">
      <thead class="table-dark">
        <tr>
              <th scope="col">ID</th>
              <th  scope="col">Planta</th>
              <th  scope="col">Aula</th>
              <th  scope="col">Descripción</th>
              <th  scope="col">Fecha alta</th>
              <th  scope="col">Fecha revisión</th>
              <th  scope="col">Fecha solución</th>
              <th  scope="col">Comentario</th>
        </tr>  
      </thead>
        <tbody>
          <tr>
               
            <?php
              if (isset($_GET['incidencia_id'])) {
                  $incidenciaid = htmlspecialchars($_GET['incidencia_id']); 
<<<<<<< HEAD
                  $query="SELECT * FROM incidencia WHERE id = {$incidenciaid} LIMIT 1";  
=======
                  $query="SELECT * FROM incidencias WHERE id = {$incidenciaid} LIMIT 1";  
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

                        echo "<tr >";
                        echo " <td >{$id}</td>";
                        echo " <td > {$planta}</td>";
                        echo " <td > {$aula}</td>";
                        echo " <td >{$descripcion} </td>"; 
<<<<<<< HEAD
                        echo " <td >{$alta} </td>";
                        echo " <td >{$revision} </td>";
                        echo " <td >{$resolucion} </td>";
=======
                        echo " <td >{$fecha_alta} </td>";
                        echo " <td >{$fecha_rev} </td>";
                        echo " <td >{$fecha_sol} </td>";
>>>>>>> 47c15eb7986fe494d27b90daf9de09d7f29b0fa2
                        echo " <td >{$comentario} </td>";
                        echo " </tr> ";
                  }
                }
            ?>
          </tr>  
        </tbody>
    </table>
  </div>

  <div class="container text-center mt-5">
    <a href="home.php" class="btn btn-warning mt-5"> Volver </a>
  <div>

<?php include "../footer.php" ?>