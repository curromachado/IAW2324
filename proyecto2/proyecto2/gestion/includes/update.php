<?php
include '../header.php';

if(isset($_GET['incidencia_id'])) {
    $incidenciaid = htmlspecialchars($_GET['incidencia_id']); 

    $query = "SELECT * FROM incidencias WHERE id = $incidenciaid ";
    $vista_incidencias = mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($vista_incidencias)) {
        $id = $row['id'];                
        $planta = $row['id_planta'];        
        $aula = $row['id_aula'];      
        $descripcion = $row['descripcion'];        
        $alta = $row['fecha_alta'];        
        $revision = $row['fecha_revision'];        
        $resolucion = $row['fecha_resolucion'];        
        $comentario = $row['comentarios'];
        $estado = $row['estado']; 
    }

    if(isset($_POST['editar'])) {
        $planta = htmlspecialchars($_POST['planta']);
        $aula = htmlspecialchars($_POST['aula']);
        $descripcion = htmlspecialchars($_POST['descripcion']);
        $alta = htmlspecialchars($_POST['alta']);
        $revision = htmlspecialchars($_POST['revision']);
        $resolucion = htmlspecialchars($_POST['resolucion']);
        $comentario = htmlspecialchars($_POST['comentario']);
        $estado = htmlspecialchars($_POST['estado']); 

        $query = "UPDATE incidencias SET id_planta = '{$planta}' , id_aula = '{$aula}' , descripcion = '{$descripcion}', fecha_alta = '{$alta}', fecha_revision = '{$revision}', fecha_resolucion = '{$resolucion}', comentarios = '{$comentario}', estado = '{$estado}' WHERE id = {$id}";
        $incidencia_actualizada = mysqli_query($conn, $query);

        if (!$incidencia_actualizada) {
            echo "Se ha producido un error al actualizar la incidencia.";
        } else {
            echo "<script type='text/javascript'>alert('¡Datos de la incidencia actualizados!')</script>";
        }
    }
}

$fechaHoy = date("Y-m-d"); 
?>

<div class="container">
    <?php include "barra_admin.php"?>
    <div class="header-container text-white p-4 rounded shadow-sm mb-4" style="background-color: #154c79">
        <h1 class="text-center">Editar Incidencia</h1>
    </div>
    <form action="" method="post">
        <div class="form-group">
            <label for="planta" class="form-label">Planta</label>
            <select name="planta" id="plantaSelect" class="form-control">
                <option value="1" <?php if($planta == 1) echo 'selected'; ?>>Planta Baja</option>
                <option value="2" <?php if($planta == 2) echo 'selected'; ?>>Planta Primera</option>
                <option value="3" <?php if($planta == 3) echo 'selected'; ?>>Planta Segunda</option>
            </select>
        </div>
        <div class="form-group">
            <label for="aula" class="form-label">Aula</label>
            <select name="aula" id="aulaSelect" class="form-control">
                <?php
                $opcionesAula = [
                    1 => ['nombre' => 'Aula 1', 'id' => '1'],
                    2 => ['nombre' => 'Aula 2', 'id' => '2'],
                    3 => ['nombre' => 'Aula 3', 'id' => '3'],
                    4 => ['nombre' => 'Aula 4', 'id' => '4'],
                    5 => ['nombre' => 'Aula 5', 'id' => '5'],
                    6 => ['nombre' => 'Aula 6', 'id' => '6'],
                    7 => ['nombre' => 'Aula 7', 'id' => '7'],
                    8 => ['nombre' => 'Aula 8', 'id' => '8'],
                    9 => ['nombre' => 'Aula 9', 'id' => '9'],
                ];

                foreach ($opcionesAula as $opcion) {
                    $selected = ($opcion['id'] == $aula) ? 'selected' : '';
                    echo "<option value='{$opcion['id']}' $selected>{$opcion['nombre']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" name="descripcion" class="form-control" value="<?php echo $descripcion; ?>">
        </div>
        <div class="form-group">
            <label for="alta" class="form-label">Fecha Alta</label>
            <input type="date" name="alta" class="form-control" value="<?php echo $alta; ?>" max="<?php echo $fechaHoy; ?>">
        </div>
        <div class="form-group">
            <label for="revision" class="form-label">Fecha Revisión</label>
            <input type="date" name="revision" class="form-control" value="<?php echo $revision; ?>" max="<?php echo $fechaHoy; ?>">
        </div>
        <div class="form-group">
            <label for="resolucion" class="form-label">Fecha Resolución</label>
            <input type="date" name="resolucion" class="form-control" value="<?php echo $resolucion; ?>" max="<?php echo $fechaHoy; ?>">
        </div>
        <div class="form-group">
            <label for="comentario" class="form-label">Comentario</label>
            <input type="text" name="comentario" class="form-control" value="<?php echo $comentario; ?>">
        </div>
        <div class="form-group">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" class="form-control">
                <option value="pendiente" <?php if($estado == 'pendiente') echo 'selected'; ?>>Pendiente</option>
                <option value="resuelta" <?php if($estado == 'resuelta') echo 'selected'; ?>>Resuelta</option>
            </select>
        </div>
        <div class="d-flex justify-content-between">
            <div class="form-group">
                <input type="submit" name="editar" class="btn btn-primary mt-2 mb-5" value="Editar">
            </div>
            <div class="form-group">
                <a href="admin_page.php" class="btn btn-warning mt-2 mb-5">Volver</a>
            </div>
        </div>
    </form>    
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var plantaSelect = document.getElementById('plantaSelect');
    var aulaSelect = document.getElementById('aulaSelect');

    var opcionesAula = {
        1: [{ nombre: 'Aula 1', id: '1' }, { nombre: 'Aula 2', id: '2' }, { nombre: 'Aula 3', id: '3' }],
        2: [{ nombre: 'Aula 4', id: '4' }, { nombre: 'Aula 5', id: '5' }, { nombre: 'Aula 6', id: '6' }],
        3: [{ nombre: 'Aula 7', id: '7' }, { nombre: 'Aula 8', id: '8' }, { nombre: 'Aula 9', id: '9' }]
    };


    function actualizarOpcionesAula() {
        console.log("Función actualizarOpcionesAula llamada");
        var plantaSeleccionada = plantaSelect.value;
        console.log("Planta seleccionada:", plantaSeleccionada);

        aulaSelect.innerHTML = '';
        console.log("Opciones de Aula eliminadas");

        opcionesAula[plantaSeleccionada].forEach(function (aula) {
            var option = document.createElement('option');
            option.value = aula.id;
            option.text = aula.nombre; 
            aulaSelect.appendChild(option);
            console.log("Aula añadida:", aula.nombre);
        });
    }

    plantaSelect.addEventListener('change', function () {
        console.log("Evento change en plantaSelect detectado");
        actualizarOpcionesAula();
    });


    console.log("Inicializando opciones de Aula");
    actualizarOpcionesAula();
});
</script>

<?php include "../footer.php" ?>
