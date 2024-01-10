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
            </tr>  
          </thead>
            <tbody>
              <tr>
 
          <?php
            $query="SELECT * FROM incidencia";               
            $vista_incidencias= mysqli_query($conn,$query);

            while($row= mysqli_fetch_assoc($vista_incidencias)){
              $id = $row['id'];                
              $planta = $row['planta'];        
              $aula = $row['aula'];         
              $descripcion = $row['descripcion'];        
              $alta = $row['alta'];        
              $revision = $row['revision'];        
              $resolucion = $row['resolucion'];        
              $comentario = $row['comentario']; 
              echo "<tr >";
              echo " <th scope='row' >{$id}</th>";
              echo " <td > {$planta}</td>";
              echo " <td > {$aula}</td>";
              echo " <td >{$descripcion} </td>";
              echo " <td >{$alta} </td>";
              echo " <td >{$revision} </td>";
              echo " <td >{$resolucion} </td>";
              echo " <td >{$comentario} </td>";
              echo " </tr> ";
                  }  
                ?>
              </tr>  
            </tbody>
        </table>
  </div>
<div class="container text-center mt-5">
      <a href="indexusuario.php" class="btn btn-warning mt-5"> Volver </a>
    <div>
<?php include "../footer.php" ?>