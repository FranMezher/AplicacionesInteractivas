<?php
include "conexion.php";
include "includes/header.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM autos WHERE id_auto = $id";
    $resultado = mysqli_query($conn, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $auto = mysqli_fetch_assoc($resultado);
    } else {
        echo "Auto no encontrado";
        exit();
    }
} else {
    echo "ID no proporcionado";
    exit();
}
?>

<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded-4">
                <div class="card-header bg-info text-white text-center py-3 rounded-top">
                    <h4 class="mb-0">MODIFICAR AUTO</h4>
                </div>

                <form action="procesar_modificar.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_auto" value="<?php echo $auto['id_auto']; ?>">

                    <div class="row p-4 align-items-start">
                        <!-- 🟢 Columna izquierda: Formulario -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nombre del auto</label>
                                <input type="text" class="form-control" name="nombre" value="<?php echo $auto['nombre']; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Categoría</label>
                                <select class="form-select-lg rounded-4 shadow w-100 bg-light" name="categoria" required>
                                    <option disabled>Elegir...</option>
                                    <?php
                                    $queryCat = "SELECT * FROM categorias";
                                    $resultadoCat = mysqli_query($conn, $queryCat);
                                    while ($row = mysqli_fetch_array($resultadoCat)) {
                                        $selected = ($row['id_categoria'] == $auto['id_categoria']) ? 'selected' : '';
                                        echo "<option value='".$row['id_categoria']."' $selected>".$row['categoria']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Precio</label>
                                <input type="text" class="form-control" name="precio" value="<?php echo $auto['precio']; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Marca</label>
                                <input type="text" class="form-control" name="marca" value="<?php echo $auto['marca']; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Imagen nueva</label>
                                <input type="file" class="form-control" name="imagen" onchange="mostrarPreview(this)">
                            </div>
                        </div>

                        <!-- 🟢 Columna derecha: Imagen + Botones -->
                        <div class="col-md-6 d-flex flex-column align-items-center">
                            <img id="previewImagen" src="<?php echo $auto['imagen']; ?>" class="img-fluid rounded shadow mb-3" alt="Imagen actual" style="max-height: 350px; object-fit: cover;">

                        </div>
                        <div class="d-flex w-100 gap-3">
                                <button type="submit" class="btn btn-primary w-50 me-2" name="modificar">Actualizar</button>
                                <a href="dashboard.php" class="btn btn-secondary w-50">Volver</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
function mostrarPreview(input) {
    const file = input.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewImagen').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
}
</script>