<?php

$conn = mysqli_connect("localhost", "root", "", "login2");
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>