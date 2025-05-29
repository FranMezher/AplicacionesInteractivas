<?php 

	function verificarSesion(){
		if(!isset($_SESSION['nombre'])){
			unset($_SESSION);
			header("location: Index.php");
		}
	}

?>