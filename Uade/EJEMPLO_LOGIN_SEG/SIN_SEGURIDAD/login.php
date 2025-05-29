<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

// hack para entrar sin credenciales 
// ' OR 1=1 -- ' 

   $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$clave'";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) >= 1) {
        $_SESSION['usuario'] = $usuario;
        header("Location: bienvenido.php");
    } else {
        echo "Usuario o contraseña incorrectos";
    }
}
?>

<form method="POST">
    Usuario: <input type="text" name="usuario" autocomplete="one-time-code"><br>
    Clave: <input type="password" name="clave" autocomplete="one-time-code"><br>
    <input type="submit" value="Iniciar sesión">
</form>
