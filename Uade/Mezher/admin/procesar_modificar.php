<?php
include "conexion.php";

if (isset($_POST['id_auto'])) {
    $id = $_POST['id_auto'];
    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precio'];
    $marca = $_POST['marca'];

    // Consulta el auto actual para obtener la ruta de la imagen
    $queryActual = "SELECT * FROM autos WHERE id_auto = $id";
    $resultadoActual = mysqli_query($conn, $queryActual);
    $autoActual = mysqli_fetch_assoc($resultadoActual);
    $imagenActual = $autoActual['imagen'];

    // Verificar si se subió una nueva imagen
    if (!empty($_FILES['imagen']['name'])) {
        $img_name = $_FILES['imagen']['name'];
        $img_tmp = $_FILES['imagen']['tmp_name'];
        $rutaImagen = "../img/" . $img_name;
        move_uploaded_file($img_tmp, $rutaImagen);
    } else {
        $rutaImagen = $imagenActual; // Usar la imagen existente
    }

    // Actualizar el registro
    $query = "UPDATE autos SET nombre='$nombre', marca='$marca', precio='$precio', id_categoria='$categoria', imagen='$rutaImagen' WHERE id_auto=$id";
    $resultado = mysqli_query($conn, $query);

    if ($resultado) {
        header("Location: dashboard.php?mensaje=Actualizado");
    } else {
        echo "Error al actualizar el auto.";
    }
} else {
    echo "Datos incompletos.";
}
?>
