<?php include "../header.php" ?>

<?php 
if(isset($_POST['crear'])) {
    $planta = htmlspecialchars($_POST['planta']);
    $aula = htmlspecialchars($_POST['aula']);
    $descripcion = htmlspecialchars($_POST['descripcion']);
    $comentario = htmlspecialchars($_POST['comentario']);
    $alta = htmlspecialchars($_POST['alta']);
    $revision = htmlspecialchars($_POST['revision']);
    $resolucion = htmlspecialchars($_POST['resolucion']);
  
    // Modifica la consulta para insertar los valores en la tabla
    $query= "INSERT INTO incidencias(id_planta, id_aula, descripcion, fecha_alta, comentarios, fecha_revision, fecha_resolucion) 
             VALUES('{$planta}','{$aula}','{$descripcion}','{$alta}','{$comentario}','{$revision}','{$resolucion}')";

    $resultado = mysqli_query($conn,$query);
    
    if (!$resultado) {
        echo "Algo ha ido mal añadiendo la incidencia: ". mysqli_error($conn);
    } else {
        echo "<script type='text/javascript'>alert('¡Incidencia añadida con éxito!')</script>";
    }         
}
?>

<?php
$fechaHoy = date("Y-m-d"); //Esto me va a servir para no poder seleccionar días futuros
?>

<div class="container">
    <?php include "barra_user.php"?>
    <div class="header-container text-white p-4 rounded shadow-sm mb-4" style="background-color: #154c79">
        <h1 class="text-center">Añadir Incidencia</h1>
    </div>
    <form action="" method="post">
        <div class="form-group">
            <label for="planta" class="form-label">Planta</label>
            <select name="planta" id="plantaSelect" class="form-control">
                <option value="1">Planta Baja</option>
                <option value="2">Planta Primera</option>
                <option value="3">Planta Segunda</option>
            </select>
        </div>
        <div class="form-group">
            <label for="aula" class="form-label">Aula</label>
            <select name="aula" id="aulaSelect" class="form-control">
            </select>
        </div>
        <div class="form-group">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" name="descripcion"  class="form-control">
        </div>
        <div class="form-group">
            <label for="alta" class="form-label">Fecha Alta</label>
            <input type="date" name="alta"  class="form-control" value="<?php echo $fechaHoy; ?>" max="<?php echo $fechaHoy; ?>">
        </div>
        <div class="form-group">
            <label for="resolucion" class="form-label">Fecha Resolucion</label>
            <input type="date" name="resolucion"  class="form-control" value="">
        </div>
        <div class="form-group">
            <label for="revision" class="form-label">Fecha Revsion</label>
            <input type="date" name="revision"  class="form-control" value="">
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
        1: [{ nombre: 'Aula 1', id: '1' }, { nombre: 'Aula 2', id: '2' }, { nombre: 'Aula 3', id: '3' }],
        2: [{ nombre: 'Aula 4', id: '4' }, { nombre: 'Aula 5', id: '5' }, { nombre: 'Aula 6', id: '6' }],
        3: [{ nombre: 'Aula 7', id: '7' }, { nombre: 'Aula 8', id: '8' }, { nombre: 'Aula 9', id: '9' }]
    };

    // Función para actualizar las opciones del campo de "Aula" según la "Planta" seleccionada
    function actualizarOpcionesAula() {
        console.log("Función actualizarOpcionesAula llamada");
        // Obtener el valor seleccionado en el campo de "Planta"
        var plantaSeleccionada = plantaSelect.value;
        console.log("Planta seleccionada:", plantaSeleccionada);

        // Limpiar las opciones actuales del campo de "Aula"
        aulaSelect.innerHTML = '';
        console.log("Opciones de Aula eliminadas");

        // Agregar las nuevas opciones según la "Planta" seleccionada
        opcionesAula[plantaSeleccionada].forEach(function (aula) {
            var option = document.createElement('option');
            option.value = aula.id; // Usar el id como valor
            option.text = aula.nombre; // Usar el nombre como texto visible
            aulaSelect.appendChild(option); // Añadir opción al select
            console.log("Aula añadida:", aula.nombre);
        });
    }

    // Evento change para el campo de "Planta"
    plantaSelect.addEventListener('change', function () {
        console.log("Evento change en plantaSelect detectado");
        // Actualizar las opciones del campo de "Aula" al cambiar la "Planta"
        actualizarOpcionesAula();
    });

    // Llamar a la función para asegurarse de que las opciones estén configuradas correctamente al cargar la página
    console.log("Inicializando opciones de Aula");
    actualizarOpcionesAula();
});
</script>

<?php include "../footer.php" ?>

