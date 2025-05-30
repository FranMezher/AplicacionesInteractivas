<?php include "includes/header.php";
include "conexion.php"; ?>



<div class="container p-4 font-poppins">
  <div class="row">
    <div class="col-md-12">
      <div class="card shadow-lg rounded-4">
        <div class="card-header bg-info text-white text-center py-3 rounded-top">
          AGREGAR AUTOS
        </div>
        <div class="card-body p-4">

          <form action="agregar.php" method="POST" enctype="multipart/form-data">
            <div class="form-group mb-3">
              <label>Nombre del auto</label>
              <input type="text" class="form-control rounded-3" name="nombre" placeholder="Ingrese nombre del auto">
            </div>
            <div class="mb-3">
              <label for="exampleDataList" class="form-label">Categoria</label><br>
              <select class="form-select rounded-3" name="categoria" required>
                <option selected>Elegir...</option>
                <?php
                $query = "SELECT * FROM categorias";
                $resultado = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($resultado)) { ?>
                  <option value="<?php echo $row['id_categoria'] ?>"><?php echo $row['categoria'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group mb-3">
              <label class="text-start">Precio</label>
              <input type="text" class="form-control" name="precio" placeholder="Ingrese precio del auto">
            </div>
            <div class="form-group mb-3">
              <label>Marca</label>
              <input type="text" class="form-control" name="marca" placeholder="Ingrese marca del auto">
            </div>
            <div class="form-group mb-4">
              <label class="form-label">Imagen</label>
              <br>
              <input type="file" class="form-control" name="imagen" required>
            </div>

            <div class="form-group d-flex justify-content-between gap-4">

              <button type="submit" class="btn btn-primary w-50" name="agregar">Agregar</button>
              <a href="dashboard.php" class="btn btn-secondary w-50" role="button">Volver</a>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include "conexion.php";
if (isset($_POST['agregar'])) {
  $nombre = $_POST['nombre'];
  $marca = $_POST['marca'];
  $precio = $_POST['precio'];
  $categoria = $_POST['categoria'];

  $imagen = $_FILES['imagen'];
  $img_loc = $_FILES['imagen']['tmp_name'];
  $img_name = $_FILES['imagen']['name'];
  $img_des = "../img/" . $img_name;

  if (!empty($img_name)) {
    move_uploaded_file($img_loc, $img_des);

    $query = "INSERT INTO autos (nombre, marca, precio, id_categoria, imagen) VALUES ('$nombre','$marca','$precio', '$categoria', '$img_des')";
    $resultado = mysqli_query($conn, $query);

    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';

    if ($resultado) {
      echo "<script>
        Swal.fire({
          icon: 'success',
          title: 'Auto agregado correctamente',
          showConfirmButton: false,
          timer: 2000
        }).then(() => {
          window.location.href='dashboard.php';
        });
      </script>";
    } else {
      echo "<script>
        Swal.fire({
          icon: 'error',
          title: 'Error al agregar el auto',
          text: 'Revisa los datos e intenta nuevamente.'
        }).then(() => {
          window.history.back();
        });
      </script>";
    }
  } else {
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
    echo "<script>
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'Por favor, selecciona una imagen para el auto.'
      }).then(() => {
        window.history.back();
      });
    </script>";
  }
}
?>