<?php include "../header.php" ?>
<div class="container mt-5 text-center" style="background-color: #154c79; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <h1 id="iuh1" class="display-4 mb-4" style="color: #dce4f7;">Gestión Simple de Incidencias</h1>
    <p class="lead mb-5" style="color: #ffffff;">
        Ejemplo sin uso de cookies ni sesiones para implementar un CRUD en PHP con MySQL
    </p>
    <div class="container">
        <form action="user_page.php" method="post">
            <div class="from-group text-center">
                <button type="submit" class="btn btn-primary btn-lg mt-2 mb-2" style="background-color: #2e86de;">¡Al lío!</button>
            </div>
        </form>
        <form action="login.php" method="post">
            <div class="from-group text-center">
                <button type="submit" class="btn btn-primary btn-lg mt-2 mb-2" style="background-color: #6c757d;">Volver al Login</button>
            </div>
        </form>
    </div>
</div>
<?php include "../footer.php" ?>


