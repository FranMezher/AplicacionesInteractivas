<?php include "includes/header.php"; ?>


<div class="container p-4">
	<div class="row">
		<div class="col-md-4 mx-auto">
			<div class="card text-center">
  <div class="card-header bg-success text-white">
    AGREGAR PERSONA
  </div>
  <div class="card-body">

  	<form action="agregar.php" method="POST">
  <div class="form-group">
    <label>Usuario</label>
    <input type="text" class="form-control" name="txtuser" placeholder="Usuario">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="text" class="form-control" name="txtmail" placeholder="Email">
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
	$user = $_POST['txtuser'];
	$mail = $_POST['txtmail'];
	if($user!=null || $mail!=null){
		$sql = "INSERT INTO personas(usuario,mail)VALUES('$user','$mail')";
		mysqli_query($con,$sql);
		header("Location:index.php");
	}	
	}

	  
	 ?>

