<?php 

	include('conexion.php');

	$usuario=$_POST['usuario'];
	$clave=$_POST['clave'];


	$contra = mysqli_query($conexion, "SELECT usuario,clave,tipo_usuario FROM usuarios WHERE usuario = '$usuario' AND clave='$clave'");

	if($row = mysqli_fetch_assoc($contra)){
		$var1=$row["clave"];
		$var2=$row["usuario"];
		$var3=$row["tipo_usuario"];
	}

		if(@$var1 == $clave and @$var2 ==$usuario){


				session_start();

				$_SESSION['usuario'] = $usuario;
				$_SESSION['tipo_usuario']=$var3;

				echo "<script type='text/javascript'>
					  location.href='menu.php';
					  </script>";	

		}


		else{

		echo	"<script type='text/javascript'>
			alert('usuario o clave incorrecta, ingrese nuevamente sus datos.');
			location.href='index.html';
					  </script>";	


		}
		

		mysqli_free_result($contra);

		mysqli_close($conexion);


 ?>		
