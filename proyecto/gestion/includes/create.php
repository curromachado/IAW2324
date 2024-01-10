<?php  include "../header.php" ?>
<?php 
  if(isset($_POST['crear'])) 
    {
        $planta = htmlspecialchars($_POST['planta']);
        $aula = htmlspecialchars($_POST['aula']);
        $descripcion = htmlspecialchars($_POST['descripcion']);
        $comentario = htmlspecialchars($_POST['comentario']);
        $alta = htmlspecialchars($_POST['alta']);
        $revision = htmlspecialchars($_POST['revision']);
        $resolucion = htmlspecialchars($_POST['resolucion']);
      
        $query= "INSERT INTO incidencia(planta, aula, descripcion, alta, revision, resolucion, comentario) VALUES('{$planta}','{$aula}','{$descripcion}','{$alta}','{$revision}','{$resolucion}','{$comentario}')";
        $resultado = mysqli_query($conn,$query);
    
          if (!$resultado) {
              echo "Algo ha ido mal añadiendo la incidencia: ". mysqli_error($conn);
          }
          else
          {
            echo "<script type='text/javascript'>alert('¡Incidencia añadida con éxito!')</script>";
          }         
    }
?>
<?php $fecha = date("Y-m-d");?>
<h1 class="text-center">Añadir incidencia</h1>
  <div class="container">
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
        <label for="aula" class="form-label">Aula</label>
        <input type="text" name="aula"  class="form-control">
      </div>
      <div class="form-group">
        <label for="descripcion" class="form-label">Descripcion</label>
        <input type="text" name="descripcion"  class="form-control">
      </div>
      <div class="form-group">
        <label for="alta" class="form-label">Fecha Alta</label>
        <input type="date" name="alta"  class="form-control" value="<?php echo $fecha; ?>">
      </div>
      <div class="form-group">
        <label for="revision" class="form-label">Fecha Revisión</label>
        <input type="date" name="revision"  class="form-control">
      </div>
      <div class="form-group">
        <label for="resolucion" class="form-label">Fecha Solución</label>
        <input type="date" name="resolucion"  class="form-control">
      </div>
      <div class="form-group">
        <label for="comentario" class="form-label">Comentario</label>
        <input type="text" name="comentario"  class="form-control">
      </div>
      <div class="form-group">
        <input type="submit"  name="crear" class="btn btn-primary mt-2" value="Añadir">
      </div>
      <div class="form_group">
        <a href="home.php" class="btn btn-warning mt-5"> Volver </a>
      <div>
    </form> 
    
  </div>
  <?php include "../footer.php" ?>

 
