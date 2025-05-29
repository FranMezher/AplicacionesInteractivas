<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    $sql = "SELECT clave FROM usuarios WHERE usuario = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $usuario);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) >= 1) {
        mysqli_stmt_bind_result($stmt, $hash);
        mysqli_stmt_fetch($stmt);
        if (password_verify($clave, $hash)) {
            $_SESSION['usuario'] = $usuario;
            header("Location: bienvenido.php");
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "Usuario no encontrado";
    }
}
?>

<form method="POST" autocomplete="off">
    Usuario: <input type="text" autocomplete="new-user" name="usuario"><br>
    Clave: <input type="password" autocomplete="new-password" name="clave"><br>
    <input type="submit" value="Iniciar sesión" >
</form>
