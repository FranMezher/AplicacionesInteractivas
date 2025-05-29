<?php 
include "conexion.php";

	$id = $_GET['id'];
	$sql = "SELECT * FROM personas WHERE id_persona = '$id'";
	$resultado = mysqli_query($con,$sql);

		while($fila = mysqli_fetch_array($resultado)){		

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

  	<form>

  		<input type="hidden" name="txtid" value="<?php echo $fila['id_persona']?>">

  <div class="form-group">
    <label>Usuario</label>
    <input type="text" class="form-control" name="txtuser" value="<?php echo $fila['usuario']?>" placeholder="Usuario">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="text" class="form-control" name="txtmail" value="<?php echo $fila['mail']?>"placeholder="Email">
  </div>

  <div class="form-group">

  	  <button type="submit" class="btn btn-primary"  name="editar">Editar</button>
  	  <a href="index.php" class="btn btn-secondary" role ="button">Volver</a>
  	
  </div>
</form>    
  </div>
</div>		

	<?php  } ?>
	</div>
	
</div>
</div>


<?php include "includes/footer.php"; ?>


 

	


	<?php 
	if(isset($_GET['editar'])){
	$idp=$_GET['txtid'];	
	$user = $_GET['txtuser'];
	$mail = $_GET['txtmail'];
	if($user!=null || $mail!=null){
		$sql = "UPDATE personas SET usuario = '$user' , mail = '$mail' WHERE id_persona = '$idp'";
		mysqli_query($con,$sql);
		if($user = 1){
			header("Location:index.php");
		}
	}	
	} ?>