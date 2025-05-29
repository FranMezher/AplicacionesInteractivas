<?php

$conn = mysqli_connect("localhost", "root", "", "autos");
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

?>