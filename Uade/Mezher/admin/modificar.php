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

                <form action="procesar_modificar.php" method="POST" novalidate>
                    <input type="hidden" name="id_auto" value="<?php echo $auto['id_auto']; ?>">

                    <div class="row p-4 align-items-start">
                        <!-- 🟢 Columna izquierda: Formulario -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nombre del auto</label>
                                <input type="text" class="form-control" name="nombre"
                                    value="<?php echo $auto['nombre']; ?>" required>
                                <div class="invalid-feedback">Por favor, ingresa el nombre del auto.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Categoría</label>
                                <select class="form-select-lg rounded-4 shadow w-100 bg-light" name="categoria" required>
                                    <option disabled value="">Elegir...</option>
                                    <?php
                                    $queryCat = "SELECT * FROM categorias";
                                    $resultadoCat = mysqli_query($conn, $queryCat);
                                    while ($row = mysqli_fetch_array($resultadoCat)) {
                                        $selected = ($row['id_categoria'] == $auto['id_categoria']) ? 'selected' : '';
                                        echo "<option value='" . $row['id_categoria'] . "' $selected>" . $row['categoria'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">Por favor, selecciona una categoría.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Precio</label>
                                <input type="number" class="form-control" name="precio" value="<?php echo $auto['precio']; ?>" required pattern="\d+" step="1" min="0">
                                <div class="invalid-feedback">Por favor, ingresa un número entero válido.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Marca</label>
                                <input type="text" class="form-control" name="marca" value="<?php echo $auto['marca']; ?>" required>
                                <div class="invalid-feedback">Por favor, ingresa la marca del auto.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Imagen nueva (opcional)</label>
                                <div class="dropzone rounded-4 border border-info p-4 text-info text-center" id="miDropzone"></div>
                                <small class="text-muted">Si no subes una nueva imagen, se mantendrá la actual.</small>
                            </div>
                        </div>

                        <!-- 🟢 Columna derecha: Imagen + Botones -->
                        <div class="col-md-6 d-flex flex-column align-items-center">
                            <img id="previewImagen" src="<?php echo $auto['imagen']; ?>"
                                class="img-fluid rounded shadow mb-3" alt="Imagen actual"
                                style="max-height: 350px; object-fit: cover;">
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

<style>
  #miDropzone.is-invalid {
    border-color: #dc3545 !important;
    background-color: #f8d7da !important;
  }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>

<script>
Dropzone.autoDiscover = false;

let imagenSubida = ''; // 🔥 Nombre de la nueva imagen

const miDropzone = new Dropzone("#miDropzone", {
  url: "subir_imagen.php",
  maxFiles: 1,
  acceptedFiles: 'image/*',
  addRemoveLinks: true,
  dictDefaultMessage: "Arrastra o haz clic aquí para subir una nueva imagen",
  init: function() {
    this.on("success", function(file, response) {
      const data = JSON.parse(response);
      if (data.status === 'ok') {
        imagenSubida = data.archivo;
        document.getElementById('miDropzone').classList.remove('is-invalid');
        document.getElementById('previewImagen').src = "../img/" + imagenSubida;
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

// 🔥 Antes de enviar el formulario, agregamos la imagen como input hidden (solo si hay una nueva)
document.querySelector("form").addEventListener("submit", function(e) {
  const precioInput = this.querySelector('input[name="precio"]');
  const isPrecioValido = /^\d+$/.test(precioInput.value);

  if (!isPrecioValido) {
    e.preventDefault();
    precioInput.classList.add('is-invalid');
    Swal.fire({
      icon: 'error',
      title: 'Precio inválido',
      text: 'Por favor, ingresa un número entero válido.'
    });
    return;
  }

  // Si hay imagen nueva, agregarla como input hidden
  if (imagenSubida !== '') {
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
