<?php include "../header.php" ?>
<?php 
     if(isset($_GET['eliminar']))
     {
         $id= htmlspecialchars($_GET['eliminar']);
         $query = "DELETE FROM incidencia WHERE id = {$id}"; 
         $delete_query= mysqli_query($conn, $query);
         // header("Location: home.php");
         echo "<script>window.location='home.php';</script>";
     }
?>
<?php include "../footer.php" ?>