<?php include "../header.php"?>
<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    // Si no está autenticado, redirigir a la página de inicio de sesión
    header("Location: login.php");
    exit();
}
?>

<div class="container mt-4">
    <div class="header-container text-white p-4 rounded shadow-sm mb-4" style="background-color: #154c79">
        <h1 class="text-center">Gestión de Incidencias (CRUD)</h1>
    </div>
    <a href="create.php" class="btn btn-success btn-lg mb-3"><i class="bi bi-plus"></i> Añadir Incidencia</a>

    <div class="table-responsive rounded">
        <table class="table table-bordered rounded table-hover custom-table">
            <thead class="text-white text-center" style="background-color: #154c79">
                <tr>
                    <th scope="col">Planta</th>
                    <th scope="col">Aula</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha Alta</th>
                    <th scope="col">Fecha Revisión</th>
                    <th scope="col">Fecha Solución</th>
                    <th scope="col">Comentario</th>
                    <th scope="col" colspan="3" class="text-center">Operaciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                $query = "SELECT * FROM incidencia";
                $vista_incidencias = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($vista_incidencias)) {
                    $id = $row['id'];
                    $planta = $row['planta'];
                    $aula = $row['aula'];
                    $descripcion = $row['descripcion'];
                    $alta = $row['alta'];
                    $revision = $row['revision'];
                    $resolucion = $row['resolucion'];
                    $comentario = $row['comentario'];

                    echo "<tr>";
                    echo "<td>{$planta}</td>";
                    echo "<td>{$aula}</td>";
                    echo "<td>{$descripcion}</td>";
                    echo "<td>{$alta}</td>";
                    echo "<td>{$revision}</td>";
                    echo "<td>{$resolucion}</td>";
                    echo "<td>{$comentario}</td>";
                    echo "<td class='text-center'><a href='view.php?incidencia_id={$id}' class='btn btn-primary'><i class='bi bi-eye'></i></a></td>";
                    echo "<td class='text-center'><a href='update.php?editar&incidencia_id={$id}' class='btn btn-secondary'><i class='bi bi-pencil'></i></a></td>";
                    echo "<td class='text-center'><a href='delete.php?eliminar={$id}' class='btn btn-danger'><i class='bi bi-trash'></i></a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="container text-center mt-5">
    <a href="index.php" class="btn btn-warning mb-5">Volver</a>
</div>

<?php include "../footer.php" ?>