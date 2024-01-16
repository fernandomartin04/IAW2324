<!-- Header -->
<?php include "../header.php"?>

  <div class="container">
    <h1 class="text-center" >Gestión de incidencias (CRUD)</h1>
      <a href="create.php" class='btn btn-outline-dark mb-2'> <i class="bi bi-person-plus"></i> Añadir incidencia</a>
        <table class="table table-striped table-bordered table-hover">
          <thead class="table-dark">
            <tr>
              <th  scope="col">ID</th>
              <th  scope="col">Planta</th>
              <th  scope="col">Aula</th>
              <th  scope="col">Descripción</th>
              <th  scope="col">Fecha alta</th>
              <th  scope="col">Fecha revisión</th>
              <th  scope="col">Fecha solución</th>
              <th  scope="col">Comentario</th>
              <th  scope="col" colspan="3" class="text-center">Operaciones</th>
            </tr>  
          </thead>
            <tbody>
              <tr>
 
          <?php
<<<<<<< HEAD
<<<<<<< HEAD
            $query="SELECT * FROM incidencia";               
=======
            $query="SELECT * FROM incidencias";               
>>>>>>> 47c15eb7986fe494d27b90daf9de09d7f29b0fa2
=======
            $query="SELECT * FROM incidencia";               
>>>>>>> 47c15eb7986fe494d27b90daf9de09d7f29b0fa2
            $vista_incidencias= mysqli_query($conn,$query);

            while($row= mysqli_fetch_assoc($vista_incidencias)){
              $id = $row['id'];                
              $planta = $row['planta'];        
              $aula = $row['aula'];         
              $descripcion = $row['descripcion'];        
<<<<<<< HEAD
<<<<<<< HEAD
              $alta = $row['alta'];        
              $revision = $row['revision'];        
              $resolucion = $row['resolucion'];        
=======
              $fecha_alta = $row['fecha_alta'];        
              $fecha_rev = $row['fecha_rev'];        
              $fecha_sol = $row['fecha_sol'];        
>>>>>>> 47c15eb7986fe494d27b90daf9de09d7f29b0fa2
=======
              $alta = $row['alta'];        
              $revision = $row['revision'];        
              $resolucion = $row['resolucion'];        
>>>>>>> 47c15eb7986fe494d27b90daf9de09d7f29b0fa2
              $comentario = $row['comentario']; 
              echo "<tr >";
              echo " <th scope='row' >{$id}</th>";
              echo " <td > {$planta}</td>";
              echo " <td > {$aula}</td>";
              echo " <td >{$descripcion} </td>";
<<<<<<< HEAD
<<<<<<< HEAD
              echo " <td >{$alta} </td>";
              echo " <td >{$revision} </td>";
              echo " <td >{$resolucion} </td>";
=======
              echo " <td >{$fecha_alta} </td>";
              echo " <td >{$fecha_rev} </td>";
              echo " <td >{$fecha_sol} </td>";
>>>>>>> 47c15eb7986fe494d27b90daf9de09d7f29b0fa2
=======
              echo " <td >{$alta} </td>";
              echo " <td >{$revision} </td>";
              echo " <td >{$resolucion} </td>";
>>>>>>> 47c15eb7986fe494d27b90daf9de09d7f29b0fa2
              echo " <td >{$comentario} </td>";
              echo " <td class='text-center'> <a href='view.php?incidencia_id={$id}' class='btn btn-primary'> <i class='bi bi-eye'></i> Ver</a> </td>";
              echo " <td class='text-center' > <a href='update.php?editar&incidencia_id={$id}' class='btn btn-secondary'><i class='bi bi-pencil'></i> Editar</a> </td>";
              echo " <td class='text-center'>  <a href='delete.php?eliminar={$id}' class='btn btn-danger'> <i class='bi bi-trash'></i> Eliminar</a> </td>";
              echo " </tr> ";
                  }  
                ?>
              </tr>  
            </tbody>
        </table>
  </div>
<div class="container text-center mt-5">
      <a href="../index.php" class="btn btn-warning mt-5"> Volver </a>
    <div>
<?php include "../footer.php" ?>