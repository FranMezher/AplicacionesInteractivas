<?php
include "conexion.php";
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM autos";
$resultado = mysqli_query($conn, $sql);

include("includes/header.php");
?>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Panel de Autos</h3>
        </div>
        <div class="card-body">
            <a class="btn btn-success mb-3" href="agregar.php" role="button">Nuevo Auto</a>
            <div class="table-responsive">
                <table id="tablaAutos" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Precio</th>
                            <th>Categoría</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                            <tr>
                                <td><?php echo $fila['id_auto']; ?></td>
                                <td><?php echo $fila['nombre']; ?></td>
                                <td><?php echo $fila['marca']; ?></td>
                                <td><?php echo $fila['precio']; ?></td>
                                <td><?php echo $fila['id_categoria']; ?></td>
                                <td><img src="<?php echo $fila['imagen']; ?>" width="60" class="img-thumbnail"></td>
                                <td>
                                    <a href="modificar.php?id=<?php echo $fila['id_auto']; ?>" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="eliminar.php?id=<?php echo $fila['id_auto']; ?>" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>
