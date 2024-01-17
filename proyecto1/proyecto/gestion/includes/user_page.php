<?php include "../header.php"?>

<div class="container mt-4">
    <div class="header-container text-white p-4 rounded shadow-sm mb-4" style="background-color: #154c79">
        <h1 class="text-center">Gestión de Incidencias (CRUD)</h1>
    </div>
    <a href="create-user.php" class="btn btn-success btn-lg mb-3"><i class="bi bi-plus"></i> Añadir Incidencia</a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover custom-table">
            <thead class="text-white text-center" style="background-color: #154c79">
                <tr>
                    <!-- Eliminamos las columnas ID, Fecha Revisión y Fecha Solución del encabezado -->
                    <th scope="col">Planta</th>
                    <th scope="col">Aula</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha Alta</th>
                    <th scope="col">Comentario</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                $query = "SELECT * FROM incidencia";
                $vista_incidencias = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($vista_incidencias)) {
                    $planta = $row['planta'];
                    $aula = $row['aula'];
                    $descripcion = $row['descripcion'];
                    $alta = $row['alta'];
                    $comentario = $row['comentario'];

                    echo "<tr>";
                    // Eliminamos la impresión de las columnas Fecha Revisión y Fecha Solución
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
