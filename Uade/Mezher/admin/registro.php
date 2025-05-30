<?php

include 'conexion.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST ['usuario'];
    $clave = $_POST ['clave'];
    $gmail = $_POST ['gmail'];

    $sql = "INSERT INTO usuario (usuario, clave, email) VALUES ('$usuario', '$clave', '$gmail')";
    if (mysqli_query($conn, $sql)) {
        echo"<script type='text/javascript'>location.href='index.php'</script>";
    } else {
        echo "Error al registrar: " . mysqli_error($conn);
    }
}
?>
