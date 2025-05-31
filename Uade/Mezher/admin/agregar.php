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

          <form action="agregar.php" method="POST" novalidate>
            <div class="form-group mb-3">
              <label>Nombre del auto</label>
              <input type="text" class="form-control rounded-3" name="nombre" placeholder="Ingrese nombre del auto" required>
              <div class="invalid-feedback">Por favor, ingresa el nombre del auto.</div>
            </div>
            <div class="mb-3">
              <label class="form-label">Categoría</label><br>
              <select class="form-select-lg rounded-4 shadow w-100 bg-light" name="categoria" required>
                <option selected disabled value="">Elegir...</option>
                <?php
                $query = "SELECT * FROM categorias";
                $resultado = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($resultado)) { ?>
                  <option value="<?php echo $row['id_categoria'] ?>"><?php echo $row['categoria'] ?></option>
                <?php } ?>
              </select>
              <div class="invalid-feedback">Por favor, selecciona una categoría.</div>
            </div>
            <div class="form-group mb-3">
              <label class="text-start">Precio</label>
              <input type="number" class="form-control" name="precio" placeholder="Ingrese precio del auto" required pattern="\d+" step="1" min="0">
              <div class="invalid-feedback">Por favor, ingresa el precio</div>
            </div>
            <div class="form-group mb-3">
              <label>Marca</label>
              <input type="text" class="form-control" name="marca" placeholder="Ingrese marca del auto" required>
              <div class="invalid-feedback">Por favor, ingresa la marca del auto.</div>
            </div>
            <div class="form-group mb-4">
              <label class="form-label">Imagen</label><br>
              <div class="dropzone rounded-4 border border-info p-4 text-info text-center" id="miDropzone" data-required="true"></div>
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
if (isset($_POST['agregar'])) {
  $nombre = $_POST['nombre'];
  $marca = $_POST['marca'];
  $precio = $_POST['precio'];
  $categoria = $_POST['categoria'];

  $imagen = $_POST['imagen_subida'] ?? ''; 
  $img_des = "../img/" . $imagen;

  echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';

  if (!empty($imagen)) {
    $query = "INSERT INTO autos (nombre, marca, precio, id_categoria, imagen) VALUES ('$nombre','$marca','$precio', '$categoria', '$img_des')";
    $resultado = mysqli_query($conn, $query);

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
    echo "<script>
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'Por favor, sube una imagen antes de continuar.'
      }).then(() => {
        window.history.back();
      });
    </script>";
  }
}
?>

<style>
  #miDropzone.is-invalid {
    border-color: #dc3545 !important;
    background-color: #f8d7da !important;
  }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>

<script>
Dropzone.autoDiscover = false;

let imagenSubida = '';

const miDropzone = new Dropzone("#miDropzone", {
  url: "subir_imagen.php",
  maxFiles: 1,
  acceptedFiles: 'image/*',
  addRemoveLinks: true,
  dictDefaultMessage: "Arrastra tu imagen o haz clic aquí",
  init: function() {
    this.on("success", function(file, response) {
      const data = JSON.parse(response);
      if (data.status === 'ok') {
        imagenSubida = data.archivo;
        document.getElementById('miDropzone').classList.remove('is-invalid');
      }
    });
    this.on("removedfile", function(file) {
      imagenSubida = '';
    });
    this.on("addedfile", function(file) {
      file.previewElement.addEventListener("click", function(e) {
        e.preventDefault();
        e.stopPropagation();
      });
    });
  }
});

document.querySelector("form").addEventListener("submit", function(e) {
  if (imagenSubida === '') {
    e.preventDefault();
    Swal.fire({
      icon: 'warning',
      title: 'Imagen requerida',
      text: 'Por favor, sube una imagen antes de continuar.'
    });
    document.getElementById('miDropzone').classList.add('is-invalid');
  } else {
    document.getElementById('miDropzone').classList.remove('is-invalid');
    const inputHidden = document.createElement("input");
    inputHidden.type = "hidden";
    inputHidden.name = "imagen_subida";
    inputHidden.value = imagenSubida;
    this.appendChild(inputHidden);
  }
});
</script>

<script>
(() => {
  'use strict';
  const forms = document.querySelectorAll('form');
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', function(event) {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
        Swal.fire({
          icon: 'warning',
          title: 'Formulario incompleto',
          text: 'Por favor, completa todos los campos obligatorios.'
        });
      }
      form.classList.add('was-validated');
    }, false);
  });
})();
</script>
