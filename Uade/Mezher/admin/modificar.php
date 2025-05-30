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

<div class="container p-4">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card text-center">
                <div class="card-header bg-warning text-white">
                    Modificar auto
                </div>
                <div class="card-body">
                    <form action="procesar_modificar.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_auto" value="<?php echo $auto['id_auto']; ?>">
                        <div class="form-group">
                            <label>Nombre del auto</label>
                            <input type="text" class="form-control" name="nombre" value="<?php echo $auto['nombre']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Categoría</label>
                            <select class="form-select" name="categoria" required>
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
                        <div class="form-group">
                            <label>Precio</label>
                            <input type="text" class="form-control" name="precio" value="<?php echo $auto['precio']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Marca</label>
                            <input type="text" class="form-control" name="marca" value="<?php echo $auto['marca']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Imagen actual</label><br>
                            <img src="<?php echo $auto['imagen']; ?>" width="100" class="img-thumbnail mb-2">
                            <input type="file" class="form-control" name="imagen">
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="dashboard.php" class="btn btn-secondary">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
