<?php

include("includes/header.php");

include("conexion.php");

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$user = mysqli_query($conn, "SELECT usuario,clave FROM usuario WHERE usuario = '$usuario' AND clave='$clave'");

if ($row = mysqli_fetch_assoc($user)) {
	$var_pass = $row["clave"];
	$var_usuario = $row["usuario"];
}

// si una de las variables no esta definida PHP envia un error. Para suprimir esto usamos "@"

if (@$var_pass == $clave and @$var_usuario == $usuario) {
	session_start();
	$_SESSION['usuario'] = $usuario;



	echo "<script type='text/javascript'>location.href='dashboard.php'</script>";

} else {

	echo "<script>Swal.fire({
  					icon: 'error',
  					title: 'Oops...',
  					text: 'Usuario o contraseña incorrecto',
					}).then(() => {
  						location.href='index.php';
					});
			</script>";
}

mysqli_free_result($user);
mysqli_close($conn);
include("includes/footer.php");

?>