<?php include "conexion.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>CRUD con Modales</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
  <h2>Lista de Personas</h2>
  <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalAgregar">Agregar Persona</button>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
    <?php
    // Consulta para mostrar registros
    $sql = "SELECT * FROM personas";
    $resultado = mysqli_query($con, $sql);
?>
<?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
  <tr>
    <td><?php echo $fila['nombre']; ?></td>
    <td><?php echo $fila['email']; ?></td>
    <td>
      <button 
        class="btn btn-warning btnEditar"
        data-id="<?php echo $fila['id']; ?>"
        data-nombre="<?php echo $fila['nombre']; ?>"
        data-email="<?php echo $fila['email']; ?>"
        data-bs-toggle="modal"
        data-bs-target="#modalEditar"
      >
        Editar
      </button>
      
      <button 
        class="btn btn-danger btnEliminar"
        data-id="<?php echo $fila['id']; ?>"
        data-bs-toggle="modal"
        data-bs-target="#modalEliminar"
      >
        Eliminar
      </button>
    </td>
  </tr>
<?php } ?>


  
    
    </tbody>
  </table>
</div>

<!-- Modal Agregar -->
<div class="modal fade" id="modalAgregar" tabindex="-1">
  <div class="modal-dialog">
    <form class="modal-content" method="POST" action="procesar.php">
      <div class="modal-header">
        <h5 class="modal-title">Agregar Persona</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre" required>
        <input type="email" name="email" class="form-control" placeholder="Email" required>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" name="agregar">Guardar</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Editar -->
<div class="modal fade" id="modalEditar" tabindex="-1">
  <div class="modal-dialog">
    <form class="modal-content" method="POST" action="procesar.php">
      <div class="modal-header">
        <h5 class="modal-title">Editar Persona</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="edit-id">
        <input type="text" name="nombre" id="edit-nombre" class="form-control mb-2" required>
        <input type="email" name="email" id="edit-email" class="form-control" required>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success" name="editar">Actualizar</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Eliminar -->
<div class="modal fade" id="modalEliminar" tabindex="-1">
  <div class="modal-dialog">
    <form class="modal-content" method="POST" action="procesar.php">
      <div class="modal-header">
        <h5 class="modal-title">Eliminar Persona</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>¿Seguro que desea eliminar esta persona?</p>
        <input type="hidden" name="id" id="delete-id">
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger" name="eliminar">Eliminar</button>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="acciones.js"></script>
</body>
</html>
