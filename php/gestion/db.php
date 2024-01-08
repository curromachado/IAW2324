<?php
$servername = "sql307.thsite.top";
$database = "thsi_35748541_curro";
$username = "thsi_35748541";
$password = "GkIoSmUV";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
mysqli_close($conn);
?>