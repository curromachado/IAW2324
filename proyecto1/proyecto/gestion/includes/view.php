<?php  include '../header.php'?>

  <div class="container">
    <div class="header-container text-white p-4 rounded shadow-sm mb-4" style="background-color: #154c79">
        <h1 class="text-center">Detalles Incidencias</h1>
    </div>
    <table class="table table-bordered table-hover custom-table mt-5">
      <thead class="text-white text-center" style="background-color: #154c79">
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
        <tbody class="text-center">
          <tr>
            <?php
              if (isset($_GET['incidencia_id'])) {
                  $incidenciaid = htmlspecialchars($_GET['incidencia_id']); 
                  $query="SELECT * FROM incidencia WHERE id = {$incidenciaid} LIMIT 1";  
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

                        echo "<tr >";
                        echo " <td >{$id}</td>";
                        echo " <td > {$planta}</td>";
                        echo " <td > {$aula}</td>";
                        echo " <td >{$descripcion} </td>"; 
                        echo " <td >{$alta} </td>";
                        echo " <td >{$revision} </td>";
                        echo " <td >{$resolucion} </td>";
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
    <a href="admin_page.php" class="btn btn-warning mt-5"> Volver </a>
  <div>

<?php include "../footer.php" ?>