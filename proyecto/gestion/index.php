<?php include "header.php" ?>
<div class="container mt-5">
    <h1 class="text-center"> Gestión simple de incidencias</h1>
        <p class="text-center">
            Ejemplo sin uso de cookies ni sesiones para implementar un CRUD en PHP con MySQL
        </p>
  <div class="container">
    <form action="includes/home.php" method="post">
        <div class="from-group text-center">
            <input type="submit" class="btn btn-primary mt-2" value="¡Al lío!">
        </div>
    </form>
    <form action="includes/login.php" method="post">
        <div class="from-group text-center">
            <input type="submit" class="btn btn-primary mt-2" value="Volver al Login">
        </div>
    </form>
  </div>
</div>
<?php include "footer.php" ?>