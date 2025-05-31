<?php
include "conexion.php";

if (isset($_POST['id_auto'])) {
    $id = $_POST['id_auto'];
    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precio'];
    $marca = $_POST['marca'];

    // 🔥 Obtenemos la imagen actual del auto
    $queryActual = "SELECT * FROM autos WHERE id_auto = $id";
    $resultadoActual = mysqli_query($conn, $queryActual);
    $autoActual = mysqli_fetch_assoc($resultadoActual);
    $imagenActual = $autoActual['imagen'];

    // 🔥 Tomamos la imagen subida por Dropzone (si la hay)
    $nombreImagenNueva = $_POST['imagen_subida'] ?? '';

    if (!empty($nombreImagenNueva)) {
        $rutaImagen = "../img/" . $nombreImagenNueva; // 🔥 Si hay nueva, usamos la nueva
    } else {
        $rutaImagen = $imagenActual; // 🔥 Si no hay nueva, usamos la actual
    }

    // 🔥 Actualizar el registro en la base de datos
    $query = "UPDATE autos SET nombre='$nombre', marca='$marca', precio='$precio', id_categoria='$categoria', imagen='$rutaImagen' WHERE id_auto=$id";
    $resultado = mysqli_query($conn, $query);
?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Modificar Auto</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <script>
        <?php if ($resultado) { ?>
            Swal.fire({
                icon: 'success',
                title: 'Auto modificado correctamente',
                showConfirmButton: false,
                timer: 2000
            }).then(() => {
                window.location.href = 'dashboard.php';
            });
        <?php } else { ?>
            Swal.fire({
                icon: 'error',
                title: 'Error al modificar el auto',
                text: 'Por favor, intenta nuevamente.'
            }).then(() => {
                window.history.back();
            });
        <?php } ?>
        </script>
    </body>
    </html>
<?php
} else {
?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Error</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <script>
        Swal.fire({
            icon: 'warning',
            title: 'Datos incompletos',
            text: 'Por favor, verifica el formulario.'
        }).then(() => {
            window.history.back();
        });
        </script>
    </body>
    </html>
<?php
}
?>
