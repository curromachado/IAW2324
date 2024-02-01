<?php
// Consulta SQL para contar el total de incidencias, las resueltas y las pendientes
$queryTotal = "SELECT COUNT(*) AS total FROM incidencias";
$queryResueltas = "SELECT COUNT(*) AS resueltas FROM incidencias WHERE estado = 'resuelta'";
$queryPendientes = "SELECT COUNT(*) AS pendientes FROM incidencias WHERE estado = 'pendiente'";

// Ejecutar las consultas y obtener los resultados
$resultadoTotal = mysqli_query($conn, $queryTotal);
$resultadoResueltas = mysqli_query($conn, $queryResueltas);
$resultadoPendientes = mysqli_query($conn, $queryPendientes);

// Obtener los valores de los resultados
$totalIncidencias = mysqli_fetch_assoc($resultadoTotal)['total'];
$resueltas = mysqli_fetch_assoc($resultadoResueltas)['resueltas'];
$pendientes = mysqli_fetch_assoc($resultadoPendientes)['pendientes'];
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total de Incidencias</h5>
                    <p class="card-text"><?php echo $totalIncidencias; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Incidencias Resueltas</h5>
                    <p class="card-text"><?php echo $resueltas; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Incidencias Pendientes</h5>
                    <p class="card-text"><?php echo $pendientes; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
