<?php 
include "conexion.php";

// Validamos que se haya recibido un ID por GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para obtener los datos de la persona con ese ID
    $sql = "SELECT * FROM personas WHERE id_persona = '$id'";
    $resultado = mysqli_query($con, $sql);

    // Como id_persona es clave primaria, esperamos solo una fila
    if ($fila = mysqli_fetch_array($resultado)) {
?>

<?php include "includes/header.php"; ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card text-center mx-auto">
                <div class="card-header bg-primary text-white">
                    EDITAR PERSONA
                </div>
                <div class="card-body">
                    <!-- Formulario para editar usuario y mail -->
                    <form method="GET">
                        <!-- Campo oculto con el ID -->
                        <input type="text" name="txtid" value="<?php echo $fila['id_persona'] ?>">

                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" class="form-control" name="txtuser" value="<?php echo $fila['usuario'] ?>" placeholder="Usuario">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="txtmail" value="<?php echo $fila['mail'] ?>" placeholder="Email">
                        </div>
                        <div class="form-group">
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
        echo "<p>Error: persona no encontrada.</p>";
    }
} else {
    echo "<p>Error: ID no especificado.</p>";
}

// Proceso de edición al presionar el botón "Editar"
if (isset($_GET['editar'])) {
    // Recuperamos los datos del formulario
    $idp = $_GET['txtid'];    
    $user = $_GET['txtuser'];
    $mail = $_GET['txtmail'];

    // Verificamos que al menos uno de los campos no esté vacío
    if (!empty($user) || !empty($mail)) {
        // Consulta para actualizar los datos
        $sql = "UPDATE personas SET usuario = '$user', mail = '$mail' WHERE id_persona = '$idp'";
        mysqli_query($con, $sql);

        // Redireccionamos a la página principal
        header("Location: index.php");
        exit;
    }
}
?>
