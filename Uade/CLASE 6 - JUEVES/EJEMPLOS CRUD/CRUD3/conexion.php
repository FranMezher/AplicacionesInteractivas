<?php
// Archivo de conexión a la base de datos
$host = "localhost";
$user = "root";
$pass = "";
$db = "crud_modal";

// Crear conexión
$con = mysqli_connect($host, $user, $pass, $db);

// Verificar conexión
if (!$con) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
