<?php
	include("conexion.php");

	$nombre=$_POST['nombre'];
	$pass=$_POST['pass'];

	$datosuser=mysqli_query($conexion, "SELECT nombre_usuario,password FROM usuarios WHERE nombre_usuario ='".$nombre."' AND password='".$pass."'");
	if($row=mysqli_fetch_assoc($datosuser)){
		$var_password=$row["password"];
		$var_user=$row["nombre_usuario"];
	}

	if(@$var_password==$pass AND @$var_user==$nombre){
    session_start();
    $_SESSION['nombre']=$nombre;

    echo "
 		<script type='text/javascript'>
    		location.href='formulario.php';
      	</script>
    ";
	}else{

  	echo "
  	<script type='text/javascript'>
  		alert('Usuario o contraseña INCORRECTOS, ingrese por favor nuevamente sus datos');
  		location.href='index.php';
  	</script>";
	}

?>