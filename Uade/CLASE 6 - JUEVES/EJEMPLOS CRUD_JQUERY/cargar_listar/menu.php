<?php
session_start();

if(!isset($_SESSION['usuario'])){
  echo "<script language=javascript> location.href='index.html';</script>";die();
} 

?> 

<!DOCTYPE html>
<html lang="en">
	<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Formulario De Contacto</title>
    <script src="jquery/jquery-3.7.1.min.js"></script>

	</head>
<body>


<button><a href="logout.php" name="salir">Salir</a></button>
<br><br>
			<form action="modulo.php" method="POST">
        <div>  			
  					<label>Su DNI:</label>	
  					<input type="text" id="dni" placeholder="Su documento">
  			</div>
        
        <div>         
            <label >Su Nombre:</label>
            <input type="text" id="nombre"  placeholder="Su nombre">
        </div>
        <div>         
            <label>Su apellido</label>
            <input type="text" id="apellido"  placeholder="Su apellido"> 
        </div> 
        
        
        <div>

      

        <button type="button" name="listar" onclick="listarDatos();">LISTAR</button>

        <!-- onclick = " " es un atributo html para invocar una funcion de js -->


        <button type="button" name="cargar" id="btncargar">CARGAR </button>
        </div>

        <br><br>
    

	    </form>

    <div id="tabla" style="background-color:yellow">aca se va a cargar la lista de registros</div> 

    <div id="eliminar">

          <input type="text" id="caja">

          <?php

          if($_SESSION['tipo_usuario']==1){

           echo'              
          <button type="button"  id="delete">ELIMINAR</button>
          <button type="button" id="delete_log">ELIMINAR LOGICO</button>
          ';
          }


          ?>

        <button type="button"  id="modificar">MODIFICAR</button>

    </div>

<script type="text/javascript">

  var vector=new Array();

  function listarDatos(){
      $("#tabla").load("modulo.php",{opcion:'leer'});

// el metodo .load busca un archivo en el servidor y lo carga en la opcion leer

    }

      $("#btncargar").click(function(){
        vector[1]=$('#dni').val();
        vector[2]=$('#nombre').val();
        vector[3]=$('#apellido').val();
        $.post("modulo.php",{opcion:'crear',contenido:vector},function(data){
          alert(data);
        });
      });

      // la funcion anonima function(data) recibe los datos al servidor
      // es una funcion tipo "callback"
      // alert(data) muestra en un alerta los datos que recibe del servidor

      $(document).on('click','#delete',function(){
          $.post('modulo.php',{opcion:'eliminar',dni: $('#caja').val()},


      function(data){
        alert(data);
          });

      });


      $(document).on('click','#delete_log',function(){

      $.post('modulo.php',{opcion:'eliminar_logico',dni: $('#caja').val()},
            

      function(data){
         alert(data);
            });

      });

 

      $(document).on('click','#modificar',function(){

        var nombre = prompt("Ingrese el Nombre: ");
        var apellido = prompt("Ingrese el Apellido: ");

        $.post('modulo.php',{opcion:'actualizar',dni: $('#caja').val(), nombre:nombre, apellido:apellido});
                   
      
      });

          

 
    

</script>


	</body>
 
      </html>