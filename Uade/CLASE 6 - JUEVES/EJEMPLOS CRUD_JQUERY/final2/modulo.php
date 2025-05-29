<?php 

	session_start();

	if(!isset($_SESSION['usuario'])){
		echo"<script language=javascript>location.href='index.php';</script>";
		die();
	}

	include "conexion.php";

	$opcion=$_POST['opcion'];

	switch($opcion){

		case 'cargar_persona':

		$query=mysqli_query($conexion,"SELECT pk_evento, evento FROM eventos");	


		echo'

		<h2>Cargar Persona</h2>


		<label>DNI</label>
			<input type="text" id="dni">
			<br><br>

		<label>Nombre</label>
			<input type="text" id="nombre">
			<br><br>
			
		<label>Celular</label>
			<input type="text" id="celular">
			<br><br>
			
		<label>Mail</label>
			<input type="text" id="mail">
			<br><br>			

		<div class="form">

			<label>Eventos</label>
			<select name="evento" id="evento">
				
				<option>Seleccione una opcion</option>
		';

				while($row=mysqli_fetch_array($query)){

				echo"<option value='".$row['pk_evento']."'>'".$row['evento']."'</option>";
					
				}

				echo'</select>

			<br><br>
			
			<button class="btn" id="btn_cargar_per">Cargar Persona</button>

		';

		break;

		case 'insertar_persona':


		$datos=$_POST["datos"];

		$dni=$datos[0];
		$nombre=$datos[1];
		$celular=$datos[2];
		$mail=$datos[3];
		$evento=$datos[4];
		

		$sqlquery= "INSERT INTO personas (dni, nombre, celular, mail, fk_evento) VALUES ('$dni','$nombre','$celular','$mail','$evento')";

		$resultado=mysqli_query($conexion,$sqlquery) or die ("problemas al cargar");

		echo "se cargo en la base de datos de forma exitosa";

		mysqli_close($conexion);

		break;

		case 'listar_ir':

		$evento=$_POST['evento'];


			$query="SELECT * FROM personas WHERE fk_evento='$evento'";

				$resultado=mysqli_query($conexion,$query);
				$num_rows=mysqli_num_rows($resultado);

				if($num_rows>0){
					$salida="<table class='tabla'>
					<tr id='titulo'>
					<td>DNI</td>
					<td>NOMBRE</td>
					<td>CELULAR</td>
					<td>MAIL</td>

					<td>ELIMINAR</td>
					


					</tr>";

					while ($vec=mysqli_fetch_assoc($resultado)){
						$salida.="<tr>
								<td>".$vec['dni']."</td>
								<td>".$vec['nombre']."</td>
								<td>".$vec['celular']."</td>
								<td>".$vec['mail']."</td>								
								
								<td><button type='button' name='eliminar' class='btneliminar' data-pk=".$vec['pk_persona'].">eliminar</button></td>
								
								</tr>";
					}
					$salida.="</table>";
				}else{
					$salida="no hay datos";
				}

				echo $salida;
				mysqli_close($conexion);



		break;	


		case 'listar':

		$query1=mysqli_query($conexion,"SELECT pk_evento, evento FROM eventos");	


		echo'
		<div class="form">

			<label>Eventos</label>
			<select name="evento" id="evento1">
				
				<option>Seleccione una opcion</option>
		';

				while($row1=mysqli_fetch_array($query1)){

				echo"<option value='".$row1['pk_evento']."'>'".$row1['evento']."'</option>";
					
				}

				echo'</select>

				<button id="ir" onclick="listar_ir()">ir</button>

			<br><br>
			';


			
			break;

			case 'eliminar':
			$pk_persona=$_POST['pk_persona'];
			$query="DELETE FROM personas WHERE pk_persona='".$pk_persona."'";
			$resultado=mysqli_query($conexion,$query) or die ("problemas al eliminar");
			echo "persona eliminada correctamente";
			break;

			

	}


 ?>