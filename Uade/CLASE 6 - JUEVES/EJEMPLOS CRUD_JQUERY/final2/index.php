
<!DOCTYPE html>
<html>
<head>
	<title>Final2</title>
	<meta charset="utf-8">
	<meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='expires' content='0'>
<meta http-equiv='pragma' content='no-cache'>
	<link rel="stylesheet" type="text/css" href="estilos/estilo.css">
	<script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
</head>
<body OnLoad="NoBack();">

		<div class="tarjeta">				
				<form action="login.php" method="POST">
					<h1>LOGIN</h1>
					Usuario<input type="text" name="user" required="required" placeholder="Ingrese Usuario" autocomplete="new-text">
					<br>
					Contraseña<input type="password" name="pass" required="required" placeholder="Ingrese Contraseña" autocomplete="new-password">
					<br>
					<input type="submit" class="boton" value="Iniciar Sesion">					
				</form>
		</div>

<!-- script que impide retroceder la pagina -->
<script language="javascript">
function NoBack(){
history.go(1)
}
</script>

</body>
</html>