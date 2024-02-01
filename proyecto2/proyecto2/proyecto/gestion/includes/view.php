<?php
include '../header.php';

if (isset($_GET['incidencia_id'])) {
    $incidenciaid = htmlspecialchars($_GET['incidencia_id']); 
    $query = "SELECT i.id, p.nombre_planta, a.nombre_aula, i.descripcion, i.fecha_alta, i.fecha_revision, i.fecha_resolucion, i.comentarios 
              FROM incidencias AS i
              INNER JOIN plantas AS p ON i.id_planta = p.id
              INNER JOIN aulas AS a ON i.id_aula = a.id
              WHERE i.id = {$incidenciaid} LIMIT 1";  
    $vista_incidencias = mysqli_query($conn, $query);            

    ?>
    <div class="container">
        <?php include "barra_admin.php"?>
        <div class="header-container text-white p-4 rounded shadow-sm mb-4" style="background-color: #154c79">
            <h1 class="text-center">Detalles Incidencias</h1>
        </div>
        <table class="table table-bordered table-hover custom-table mt-5">
            <thead class="text-white text-center" style="background-color: #154c79">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Planta</th>
                    <th scope="col">Aula</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha alta</th>
                    <th scope="col">Fecha revisión</th>
                    <th scope="col">Fecha solución</th>
                    <th scope="col">Comentario</th>
                </tr>  
            </thead>
            <tbody class="text-center">
                <?php
                while ($row = mysqli_fetch_assoc($vista_incidencias)) {
                    $id = $row['id'];                
                    $planta = $row['nombre_planta'];        
                    $aula = $row['nombre_aula'];         
                    $descripcion = $row['descripcion'];        
                    $alta = $row['fecha_alta'];        
                    $revision = $row['fecha_revision'];        
                    $resolucion = $row['fecha_resolucion'];        
                    $comentario = $row['comentarios'];

                    echo "<tr>";
                    echo "<td>{$id}</td>";
                    echo "<td>{$planta}</td>";
                    echo "<td>{$aula}</td>";
                    echo "<td>{$descripcion}</td>"; 
                    echo "<td>{$alta}</td>";
                    echo "<td>{$revision}</td>";
                    echo "<td>{$resolucion}</td>";
                    echo "<td>{$comentario}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
}
?>

<div class="container text-center mt-5">
    <a href="admin_page.php" class="btn btn-warning mt-5">Volver</a>
<div>

<?php include "../footer.php" ?>
