<?php
$conn = mysqli_connect("localhost", "root", "", "ejemplo_login");
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>
