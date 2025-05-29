<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);
    // password_hash es una función de PHP que genera un hash seguro de la contraseña
    // PASSWORD_DEFAULT utiliza el algoritmo de hashing por defecto de PHP, que es bcrypt

    $sql = "INSERT INTO usuarios (usuario, clave) VALUES (?, ?)";
    // ? es un marcador de posición para evitar inyecciones SQL
    $stmt = mysqli_prepare($conn, $sql);
    //
    mysqli_stmt_bind_param($stmt, "ss", $usuario, $clave);
    //ss indica que ambos parámetros son cadenas
    // mysqli_stmt_bind_param es una función que vincula los parámetros a la consulta preparada
    mysqli_stmt_execute($stmt);
    // mysqli_stmt_execute es una función que ejecuta la consulta preparada

    echo "Usuario creado correctamente.";
}
?>

<form method="POST">
    Usuario: <input type="text" name="usuario" required><br>
    Clave: <input type="password" name="clave" required><br>
    <input type="submit" value="Registrar">
</form>
