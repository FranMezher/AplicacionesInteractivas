<?php include "conectar/conexion.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<title>Formulario Completo</title>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand me-2">
      <img
        src="https://st.depositphotos.com/1053653/2491/i/600/depositphotos_24917717-stock-photo-logo-company-design-isea-logo.jpg"
        height="50"
        loading="lazy"
        style="margin-top: -1px;"
      />
    </a>

    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarButtonsExample"
      aria-controls="navbarButtonsExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-white" href="index.php">FORMULARIO</a>
        </li>
      </ul>
     
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!--FIN Navbar -->


<!-- CONTENIDO -->

<div class="row">
  <div class="col">

<?php

$id = $_GET['id'];

$query = "SELECT * FROM personas INNER JOIN nacionalidades ON personas.id_nacionalidad = nacionalidades.id_nacionalidad WHERE id_persona = '$id'";
$resultado = mysqli_query($conn,$query);
$row = mysqli_fetch_array($resultado);

?>


<div class="card-header text-center"><strong>Formulario de Personas </strong></div>
<div class="p-2">


<form class="row" action="proceso_modificar.php?id=<?php echo $row['id_persona'];?>" method="POST"  enctype="multipart/form-data">




<div class="col-p2">
<label class="form-label">Foto_mod</label>
<br>
<input type="file" class="form-control" name="foto" value="<?php echo $row['foto']; ?>">



<!-- muestra la foto que se va a modificar -->

<img class="img-fluid" src="fotos/<?php echo $row['foto'];?>">
</div>       
"
<div class="col p-2">
  <label class="form-label"><strong>Nombre</strong></label>
  <input type="text" REQUIRED autocomplete="off" class="form-control" name="nombre" value="<?php echo $row['nombre'];?>">
</div>


<div class="p-2">
  <label class="form-label"><strong>Sexo</strong></label><br>
  <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="sexo" value="masculino" required <?php 
  if($row['sexo']== 'masculino'){
    echo 'checked';
  } ?>>
  <label class="form-check-label" for="inlineRadio1">Masculino</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="sexo" value="femenino" required <?php 
  if($row['sexo']== 'femenino'){
    echo 'checked';
  } ?>>
  <label class="form-check-label" for="inlineRadio2">Femenino</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="sexo" value="indefinido" required <?php 
  if($row['sexo']== 'indefinido'){
    echo 'checked';
  } ?>>
  <label class="form-check-label" for="inlineRadio3">Indefinido</label>
</div>
</div>


        <?php 

$id = $_GET['id'];

          $query = "SELECT * FROM personas INNER JOIN nacionalidades ON personas.id_nacionalidad = nacionalidades.id_nacionalidad WHERE id_persona = '$id'";
          $resultado = mysqli_query($conn,$query);
          $row = mysqli_fetch_array($resultado);
          $dosis = explode('/',$row['dosis']);

?>


  <div class="col p-2">
  <label for="inputState" class="form-label">Nacionalidad_modif</label>

  <select name="nacionalidad" class="form-control">
<?php 
    $query1 = "SELECT * FROM personas INNER JOIN nacionalidades ON personas.id_nacionalidad = nacionalidades.id_nacionalidad WHERE id_persona = '$id'";
          $resultado1 = mysqli_query($conn,$query1);
          $row1 = mysqli_fetch_array($resultado1);
 ?>
     <option value="<?php echo $row1['id_nacionalidad'] ?>" selected><?php echo $row1['nacionalidad']?></option> 

  <?php

  $query1 = "SELECT * FROM nacionalidades";
  $resultado1 = mysqli_query($conn,$query1);

  while ($row1 = mysqli_fetch_array($resultado1)){?>




  <option value="<?php echo $row1['id_nacionalidad'] ?>"><?php echo $row1['nacionalidad']?></option>

  <?php } ?>       

  </select>
  </div>


<div class="p-2">
<label class="form-label"><strong>Dosis</strong></label><br>

<?php 

$id = $_GET['id'];

          $query = "SELECT * FROM personas INNER JOIN nacionalidades ON personas.id_nacionalidad = nacionalidades.id_nacionalidad WHERE id_persona = '$id'";
          $resultado = mysqli_query($conn,$query);
          $row = mysqli_fetch_array($resultado);
          $dosis = explode('/',$row['dosis']);

?>

<div class="form-check form-check-inline">
<label class="form-check-label"><input class="form-radius-input" type="checkbox" value="dosis1" <?php if(in_array('dosis1',$dosis)==true){ echo 'checked = " checked "';} ?>  name="dosis[]">1° Dosis</label>  
</div>

<!-- La función in_array() se utiliza para comprobar si un valor específico existe dentro de un array (el array $dosis).
Si 'dosis1' está presente en el array $dosis, la función devolverá true. Si no está presente, devolverá false.
Comparación con == true: -->



<!-- Si 'dosis1' se encuentra en el array $dosis, se imprime la cadena checked = "checked". Esta salida se utiliza para marcar un checkbox como seleccionado en un formulario HTML.
La propiedad checked en HTML se usa para que un checkbox aparezca marcado cuando se carga la página. -->






 
<div class="form-check form-check-inline">
<label class="form-check-label"><input class="form-radius-input" type="checkbox" value="dosis2" <?php if(in_array('dosis2',$dosis)==true){ echo 'checked = " checked "';} ?>  name="dosis[]">2° Dosis</label>  
</div>

<div class="form-check form-check-inline">
<label class="form-check-label"><input class="form-radius-input" type="checkbox" value="dosis3" <?php if(in_array('dosis3',$dosis)==true){ echo 'checked = " checked "';} ?>  name="dosis[]">3° Dosis</label>  
</div>







</div>      

       


<div class="col p-2">
<label class="form-label">Fecha de Nacimiento</label>
<input type="date" name="fecha_nac" value="<?php echo $row['fecha_nac']; ?>">
<br>   

</div>


        <div class="d-grid gap-2 p-2">
          <button type="submit" class="btn btn-primary" name="modificar">Modificar</button>
        </div>
      </form>
      </div>

    



  </div>
  <div class="col">


    <div class="card-header text-center"><strong>Listado de Personas </strong></div>

<table class="table">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Nacionalidad</th>
            <th>Foto</th>
            <th>Sexo</th>
            <th>Dosis</th>
            <th>Fecha</th>
            <th colspan="2">Operaciones</th>
          </tr> 
        </thead>

        <tbody>
          <?php
          $query = "SELECT * FROM personas INNER JOIN nacionalidades ON personas.id_nacionalidad = nacionalidades.id_nacionalidad";
          $resultado = mysqli_query($conn,$query);

          while($row = mysqli_fetch_array($resultado)){?>

            <tr>
              <td><?php echo $row['nombre'];?></td>
              <td><?php echo $row['nacionalidad'];?></td>
              <td><img height="70px" width="60px" src="fotos/<?php echo $row['foto'];?>"></td>
              <td><?php echo $row['sexo']; ?></td>
              <th><?php echo $row['dosis']; ?></th>
              <td><?php echo $row['fecha_nac']; ?></td>
              <td><a href="modificar.php?id=<?php echo $row['id_persona'];?>">Modificar</a></td>
              <td><a href="eliminar.php">Eliminar</a></td>
            </tr>

          <?php } ?>
        </tbody>
      </table>
 
    





  </div>
</div>


<!-- FIN CONTENIDO -->

<!-- footer -->

<footer class="bg-dark text-center text-white">
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2020 Copyright:
    <a class="text-white">formulario.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- fin footer -->

    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
</body>

</html>