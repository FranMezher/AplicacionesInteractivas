<?php include "includes/header.php"; ?>


<div class="container p-4">
	<div class="row">
		<div class="col-md-4 mx-auto">
			<div class="card text-center">
  <div class="card-header bg-success text-white">
    AGREGAR PRODUCTOS
  </div>
  <div class="card-body">

  	<form action="agregar.php" method="POST">
  <div class="form-group">
    <label>Producto</label>
    <input type="text" class="form-control" name="producto" placeholder="Ingrese nombre del producto">
  </div>
  <div class="form-group">
    <label>Categoria</label>
    <input type="text" class="form-control" name="categoria" placeholder="Ingrese categoria del producto">
  </div>
  <div class="form-group">
    <label>Precio</label>
    <input type="text" class="form-control" name="precio" placeholder="Ingrese precio del producto">
  </div>

  <div class="form-group">

  	  <button type="submit" class="btn btn-primary"  name="agregar">Agregar</button>
  	  <a href="index.php" class="btn btn-secondary" role ="button">Volver</a>
  	
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
  $producto = $_POST['producto'];
  $categoria = $_POST['categoria'];
  $precio = $_POST['precio'];
	if($producto!=null || $categoria!=null || $precio!=null){
		$sql = "INSERT INTO productos(producto,categoria,precio)VALUES('$producto','$categoria','$precio')";
		mysqli_query($con,$sql);
		header("Location:index.php");
	}	
	}

	  
	 ?>

