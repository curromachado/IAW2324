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
<?php
  $fechaHoy = date("Y-m-d"); //Esto me va a servir para no poder seleccionar días futuros
?>

  <div class="container">
  <div class="header-container text-white p-4 rounded shadow-sm mb-4" style="background-color: #154c79">
        <h1 class="text-center">Añadir Incidencia</h1>
    </div>
    <form action="" method="post">
      <div class="form-group">
        <label for="planta" class="form-label">Planta</label>
        <select name="planta" id="plantaSelect" class="form-control">
          <option value="baja">Planta Baja</option>
          <option value="primera">Planta Primera</option>
          <option value="segunda">Planta Segunda</option>
        </select>
      </div>
      <div class="form-group">
        <label for="aula" class="form-label">Aula</label>
        <select name="aula" id="aulaSelect" class="form-control">
        </select>
      </div>
      <div class="form-group">
        <label for="descripcion" class="form-label">Descripcion</label>
        <input type="text" name="descripcion"  class="form-control">
      </div>
      <div class="form-group">
        <label for="alta" class="form-label">Fecha Alta</label>
        <input type="date" name="alta"  class="form-control" value="<?php echo $fechaHoy; ?>" max="<?php echo $fechaHoy; ?>">
      </div>
      <div class="form-group">
        <label for="comentario" class="form-label">Comentario</label>
        <input type="text" name="comentario"  class="form-control">
      </div>
      <div class="d-flex justify-content-between">
        <div class="form-group">
          <input type="submit"  name="crear" class="btn btn-primary mt-2 mb-5" value="Añadir">
        </div>
        <div class="form-group">
          <a href="user_page.php" class="btn btn-warning mt-2 mb-5"> Volver </a>
        </div>
    </div>
    </form> 
    
  </div>
  <script>
document.addEventListener('DOMContentLoaded', function () {
    var plantaSelect = document.getElementById('plantaSelect');
    var aulaSelect = document.getElementById('aulaSelect');

    // Definir opciones de Aula para cada Planta
    var opcionesAula = {
        baja: ['Aula 1', 'Aula 2', 'Aula 3'],
        primera: ['Aula 4', 'Aula 5', 'Aula 6'],
        segunda: ['Aula 7', 'Aula 8', 'Aula 9']
    };

    // Función para actualizar las opciones del campo de "Aula" según la "Planta" seleccionada
    function actualizarOpcionesAula() {
        // Obtener el valor seleccionado en el campo de "Planta"
        var plantaSeleccionada = plantaSelect.value;

        // Limpiar las opciones actuales del campo de "Aula"
        aulaSelect.innerHTML = '';

        // Agregar las nuevas opciones según la "Planta" seleccionada
        opcionesAula[plantaSeleccionada].forEach(function (opcion) {
            var option = document.createElement('option');
            option.value = opcion;
            option.text = opcion;
            aulaSelect.add(option);
        });
    }

    // Evento change para el campo de "Planta"
    plantaSelect.addEventListener('change', function () {
        // Actualizar las opciones del campo de "Aula" al cambiar la "Planta"
        actualizarOpcionesAula();
    });

    // Llamar a la función para asegurarse de que las opciones estén configuradas correctamente al cargar la página
    actualizarOpcionesAula();
});
</script>

  <?php include "../footer.php" ?>
