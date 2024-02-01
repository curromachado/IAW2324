<?php
$servername = 'sql307.thsite.top';   
$username = 'thsi_35748541';   
$password = "GkIoSmUV";   
$dbname = 'thsi_35748541_proyecto_final';     
$conn = new mysqli($servername, $username, $password, $dbname);   
if ($conn->connect_error) {                                             
    die("Conexión fallida con base de datos: " . $conn->connect_error);     
}
?>


