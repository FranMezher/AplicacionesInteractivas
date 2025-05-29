<?php   include "conexion.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    // Consulta para obtener los datos del producto con ese ID
    $sql = "SELECT * FROM productos WHERE id = '$id'";
    $resultado = mysqli_query($con, $sql);
    
    if($fila = mysqli_fetch_array($resultado)) {
?>
<?php include "includes/header.php"; ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card text-center mx-auto">
                <div class="card-header bg-primary text-white">
                    EDITAR PRODUCTO
                </div>
                <div class="card-body">
                    <!-- Formulario para editar producto -->
                    <form method="GET">
                        <!-- Campo oculto con el ID -->
                        <input type="hidden" name="id" value="<?php echo $fila['id'] ?>">

                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="producto" value="<?php echo $fila['producto'] ?>" placeholder="Nombre del producto">
                        </div>
                        <div class="form-group">
                            <label>Categoria</label>
                            <input type="text" class="form-control" name="categoria" value="<?php echo $fila['categoria'] ?>" placeholder="Categoria del producto">
                        </div>  
                        <div class="form-group">
                            <label>Precio</label>
                            <input type="text" class="form-control" name="precio" value="<?php echo $fila['precio'] ?>" placeholder="Precio del producto">
                        </div>
                        <div class="form-group
">
                            <button type="submit" class="btn btn-primary" name="editar">Editar</button>
                            <a href="index.php" class="btn btn-secondary" role="button">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>
<?php
    } else {
        echo "<p>Error: producto no encontrado.</p>";
    }
} else {
    echo "<p>Error: ID no especificado.</p>";
}


if(isset($_GET['editar'])) {
    // Recuperamos los datos del formulario
    $idp = $_GET['id'];
    $nombre = $_GET['producto'];
    $categoria = $_GET['categoria'];
    $precio = $_GET['precio'];

    if(!empty( $nombre) && !empty($categoria) && !empty($precio)) {
        // Actualizamos el producto en la base de datos
        $sql = "UPDATE productos SET producto='$nombre', categoria='$categoria', precio='$precio' WHERE id='$idp'";
        mysqli_query($con, $sql);
        
        // Redirigimos al index
        header("Location:index.php");
        exit;
    }
}
?>