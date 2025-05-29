<?php 

session_start();
if(!isset($_SESSION['usuario'])){
	echo"<script language=javascript>location.href='index.php';</script>";
	die();
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
	<meta HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
	<title>fina2</title>
	<link rel="stylesheet" type="text/css" href="estilos/estilo.css">
	<script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
</head>
<body>

	<div id="contenedor">
			
			<h2>Eventos de La Costa</h2>
			<h3>Menu de Opciones</h3>
			<button class="cargar" onclick="cargar_persona()">Cargar Persona</button>
			<button class="listar" onclick="listarDatos()">Listar</button>
			<button><a href="logout.php" name="salir">Salir</a></button>
	</div>

	

			<div class="tablas"></div>
			<div class="tablas1"></div>

			<br><br>		
			



</body>


<script type="text/javascript">
 history.forward()
</script>

<script type="text/javascript">


		function cargar_persona(){
			$(".tablas").load("modulo.php", {opcion:"cargar_persona"});
		}

		function listar_ir(){
			$(".tablas1").load("modulo.php",{opcion:'listar_ir', evento:$('#evento1').val()});
		}

		function listarDatos(){
			$(".tablas").load("modulo.php",{opcion:'listar'});
		}






		$(document).ready(function(){

		
			var vector = new Array();

			$(document).on('click', '#btn_cargar_per', function() {

						vector[0]=$('#dni').val();            		
						vector[1]=$('#nombre').val();
						vector[2]=$('#celular').val();
						vector[3]=$('#mail').val();
						vector[4]=$('#evento').val();
						

					console.log(vector);


				$.post("modulo.php",{opcion:'insertar_persona',datos:vector},function(data){
				alert(data);
				cargar_persona();
				});
			
			});

			$(document).on('click','#btn_listar',function(){

				$('#vacio').load('modulo.php',{opcion:'listar',evento:evento})
			})


			// El atributo data-pk es un atributo de datos personalizados en HTML. Los atributos de datos personalizados se utilizan para almacenar información adicional en los elementos HTML sin afectar su apariencia o funcionalidad. Estos atributos siempre comienzan con data-, seguido de un nombre que  elijas

			

			$(document).on('click','.btneliminar',function(){
				var pk_persona = $(this).attr('data-pk');
					$.post('modulo.php',{opcion: 'eliminar',pk_persona:pk_persona},function(data){
						listar_ir();
					})

					
			})


			// Dentro de la función del evento click, $(this) se refiere al elemento que fue clicado. El código obtiene el valor del atributo data-pk de este elemento y lo guarda en la variable pk_persona





			
				
			});


			





</script>
</html>