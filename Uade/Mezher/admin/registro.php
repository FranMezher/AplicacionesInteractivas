<?php

include 'conexion.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST ['usuario'];
    $clave = $_POST ['clave'];

    $sql = "INSERT INTO usuario (usuario, clave) VALUES ('$usuario', '$clave')";
    if (mysqli_query($conn, $sql)) {
        echo "Usuario registrado con éxito. <a href='index.php'>Iniciar sesión</a>";
    } else {
        echo "Error al registrar: " . mysqli_error($conn);
    }
}
?>
