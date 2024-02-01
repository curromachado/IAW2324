<?php include "../header.php"?>

<div class="container mt-4">
    <?php include "barra_user.php"?>
    <div class="header-container text-white p-4 rounded shadow-sm mb-4" style="background-color: #154c79">
        <h1 class="text-center">Gestión de Incidencias (CRUD)</h1>
    </div>
    <a href="create-user.php" class="btn btn-success btn-lg mb-3"><i class="bi bi-plus"></i> Añadir Incidencia</a>

    <?php include "actualizacion_incidencia.php"?>
    <div class="table-responsive">
        <table class="table table-bordered table-hover custom-table">
            <thead class="text-white text-center" style="background-color: #154c79">
                <tr>
                    <th scope="col">Planta</th>
                    <th scope="col">Aula</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha Alta</th>
                    <th scope="col">Comentario</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                $query = "SELECT incidencias.*, plantas.nombre_planta, aulas.nombre_aula 
                          FROM incidencias 
                          INNER JOIN plantas ON incidencias.id_planta = plantas.id 
                          INNER JOIN aulas ON incidencias.id_aula = aulas.id";
                
                $vista_incidencias = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($vista_incidencias)) {
                    $planta = $row['nombre_planta']; 
                    $aula = $row['nombre_aula']; 
                    $descripcion = $row['descripcion'];
                    $alta = $row['fecha_alta'];
                    $comentario = $row['comentarios'];

                    echo "<tr>";
                    echo "<td>{$planta}</td>";
                    echo "<td>{$aula}</td>";
                    echo "<td>{$descripcion}</td>";
                    echo "<td>{$alta}</td>";
                    echo "<td>{$comentario}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="container text-center mt-5 mb-5">
    <a href="indexusuario.php" class="btn btn-warning">Volver</a>
</div>

<?php include "../footer.php" ?>
