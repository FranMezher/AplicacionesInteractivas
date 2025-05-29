<?php 
  session_start();
  include "Functions.php";
  verificarSesion();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php include("scripts.php"); ?>
    <title>Biblioteca.com</title>
    <style type="text/css">
      nav,footer {
background-image: url("data:image/svg+xml,%3Csvg width='42' height='44' viewBox='0 0 42 44' xmlns='http://www.w3.org/2000/svg'%3E%3Cg id='Page-1' fill='none' fill-rule='evenodd'%3E%3Cg id='brick-wall' fill='%230c0d0c' fill-opacity='0.4'%3E%3Cpath d='M0 0h42v44H0V0zm1 1h40v20H1V1zM0 23h20v20H0V23zm22 0h20v20H22V23z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
      }

    </style>
</head>

<body style="background-color: #47eb6f">


<nav class="navbar-dark nav-fill bg-dark">
    <ul class="navbar justify-content-center">
      <li class="nav-item"><a class="navbar-brand" href="#"><img src="img/logo_nuevo.png" width="100px" height="50px"></a></li>
      <li class="nav-item"><a class="navbar-brand" href="#">BIBLIOTECADIGITAL.COM</a></li>
      <li class="nav-item"><a class="navbar-link" href="#"><button class="btn btn-outline-success" onclick="cargarDatos()" type="submit">CARGAR</button></a>
      <li class="nav-item"><a class="navbar-link" href="#"><button class="btn btn-outline-warning" type="submit" onclick="listarDatos()">LISTAR</button></a></li>

      <li class="nav-item"><a class="navbar-link" href="#"><button class="btn btn-outline-danger" type="submit" onclick="salir()">SALIR</button></a></li>

     


    </ul>
</nav>


<main>


  <div class="container">
    <h3>Formulario</h3>
    <br>
    <form>
      <div class="form-group">
        <label>Titulo</label>
        <input type="text" class="form-control" id="tit" placeholder="Ingrese el titulo del libro" required="required">
        <br>
        <label>Autor</label>
        <input type="text" class="form-control" id="aut" placeholder="Ingrese el nombre del autor">
        <br>

        <label>Autor Nacional</label>
        <div class="form-check form-check-inline">
          <input type="radio" class="form-check-input" id="positivo" name="radio1" value="si">
          <label class="form-check-label">Si</label>
        </div>

        <div class="form-check form-check-inline">
          <input type="radio" id="negativo" name="radio1" value="no">
          <label class="form-check-label">No</label>
        </div>   
        <br><br>

        <label>Idiomas</label>

        <div class="form-check form-check-inline">
         <input type="checkbox" class="checkleng" id="esp" value="español">
         <label class="form-check-label">Español</label>
       </div>

       <div class="form-check form-check-inline">
        <input type="checkbox" class="checkleng" id="ing" value="ingles">
        <label class="form-check-label">Ingles</label>
      </div>

      <br><br>

      <div class="form-group">
        <label>Genero</label>
        <select class="form-control" name="genero">
          <option value="horror">Horror</option>
          <option value="drama">Drama</option>
          <option value="comedia">Comedia</option>
          <option value="accion">Accion</option>
        </select>      
      </div>
    </div>
  </form>


  <hr>

 
  <br>

  

  <div class="tabla">
   

  </div>

  <br>


  </div>



    
  

</main>


<footer class="page-footer font-small blue bg-dark">

  <!-- Copyright -->
  <div class="footer-copyright text-center text-white py-3">San Bernardo - Buenos Aires - Argentina © 2021 Copyright:
    <a href="https://mdbootstrap.com/"> www.bibliotecadigital.com</a>
  </div>
  <!-- Copyright -->

</footer>
</body>


<script type="text/javascript">

  	var datos=[];

    function salir(){
      $(location).attr('href','index.php');
    };

       	function cargarDatos(){

           	var vector=new Array();
           	var i;


           	vector[0]=$('#tit').val();
           	vector[1]=$('#aut').val();
           	vector[2]=$('input:radio[name=radio1]:checked').val();
            if(($('#esp').is(':checked')) && ($('#ing').is(':checked'))){
					vector[3]=3;
			}else{
				if($('#esp').is(':checked')){
					vector[3]=1;
				}else{
					if ($('#ing').is(':checked')) {
						vector[3]=2;
					}
				}
			}
           	vector[4]=$('select[name="genero"] option:selected').text();
            switch (vector[4]){
              case 'Horror':
                vector[4]=1
              break;
              case 'Drama':
                vector[4]=2
              break;
              case 'Comedia':
                vector[4]=3;
              break;
              case 'Accion':
                vector[4]=4;
              break; 
            }
            console.log(vector);


	        $.post("modulo.php",{opcion: 'cargar', datos: vector});
	       	
        }

        function listarDatos(){
          $(".tabla").load('modulo.php',{opcion:''});
        }

        $(document).on('click', '#btneliminar', function() {
          var pklibro = $(this).attr('data-pk');
            $.post('modulo.php',{opcion: 'eliminar',pklibro:pklibro}, function(data){
                listarDatos();
            });
        });

</script>
</html>