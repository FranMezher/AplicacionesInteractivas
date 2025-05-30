<?php include "includes/header.php"; 
include "conexion.php";?>



<div class="container p-4">
	<div class="row">
		<div class="col-md-4 mx-auto">
			<div class="card text-center">
  <div class="card-header bg-success text-white">
    AGREGAR AUTOS
  </div>
  <div class="card-body">

  	<form action="agregar.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label>Nombre del auto</label>
    <input type="text" class="form-control" name="nombre" placeholder="Ingrese nombre del auto">
  </div>
  <div class="form-group">
    <label for="inputState" class="form-label">Categoria</label><br>
    <select class="form-select" name="categoria" required >
      <option selected>Elegir...</option>
      <?php
      $query = "SELECT * FROM categorias";
      $resultado = mysqli_query($conn, $query);
      while ($row = mysqli_fetch_array($resultado)) { ?>
        <option value="<?php echo $row['id_categoria'] ?>"><?php echo $row['categoria'] ?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label>Precio</label>
    <input type="text" class="form-control" name="precio" placeholder="Ingrese precio del auto">
  </div>
  <div class="form-group">
    <label>Marca</label>
    <input type="text" class="form-control" name="marca" placeholder="Ingrese marca del auto">
  </div>
  <div class="form-group">
    <label class="form-label">Imagen</label>
    <br>
    <input type="file" class="form-control" name="imagen" required>
  </div>

  <div class="form-group">

  	  <button type="submit" class="btn btn-primary"  name="agregar">Agregar</button>
  	  <a href="dashboard.php" class="btn btn-secondary" role ="button">Volver</a>
  	
  </div>
</form>    
  </div>
</div>
		</div>
	</div>
</div>

<?php 
include "conexion.php";


if(isset($_POST['agregar'])){
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];	




//  La función implode() toma un array  $_POST['dosis'] y lo convierte en una cadena de texto. Cada elemento del array se une en una sola cadena utilizando el carácter '/' como separador. Esto significa que los valores seleccionados se combinarán en una sola cadena, separados por barras (/) y se almacena en la variable $dosis




//  El array $_FILES contiene información sobre los archivos cargados mediante un formulario HTML.

//  La clave 'foto' hace referencia al nombre del campo del archivo en el formulario (por ejemplo, <input type="file" name="foto">).

// El array $_FILES['foto'] contiene varias propiedades importantes:

// $_FILES['foto']['name']: El nombre original del archivo en el sistema del usuario.
// $_FILES['foto']['type']: El tipo MIME (standar para manejar archivos en la web) del archivo (por ejemplo, image/jpeg).
// $_FILES['foto']['tmp_name']: La ubicación temporal del archivo en el servidor.
// $_FILES['foto']['error']: Un código de error asociado con la carga del archivo.
// $_FILES['foto']['size']: El tamaño del archivo en bytes

// print_r($_FILES['foto']);
// imprime en pantalla toda la información contenida en el array $_FILES['foto'], 


$imagen = $_FILES['imagen'];
print_r($_FILES['imagen']);
$img_loc = $_FILES['imagen']['tmp_name'];
$img_name = $_FILES['imagen']['name'];
$img_des = "../img/".$img_name;
move_uploaded_file($img_loc,'../img/'.$img_name);

// La función move_uploaded_file() mueve el archivo desde su ubicación temporal (almacenada en $img_loc) hasta la carpeta de destino (fotos/).






$query = "INSERT INTO autos (nombre, marca, precio, id_categoria, imagen)VALUES( '$nombre','$marca','$precio', '$categoria', '$img_des')";

$resultado = mysqli_query($conn,$query);

header("Location:dashboard.php");
}
?>