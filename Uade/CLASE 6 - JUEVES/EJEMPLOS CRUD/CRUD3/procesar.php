<?php
include "conexion.php";

// Insertar nuevo registro
if (isset($_POST['agregar'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $sql = "INSERT INTO personas (nombre, email) VALUES ('$nombre', '$email')";
    mysqli_query($con, $sql); // Ejecuta la consulta
    header("Location: index.php"); // Redirige
}

// Actualizar registro existente
if (isset($_POST['editar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $sql = "UPDATE personas SET nombre='$nombre', email='$email' WHERE id=$id";
    mysqli_query($con, $sql);
    header("Location: index.php");
}

// Eliminar registro
if (isset($_POST['eliminar'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM personas WHERE id=$id";
    mysqli_query($con, $sql);
    header("Location: index.php");
}
?>
