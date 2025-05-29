      <div class="card-header text-center"><strong>Formulario de Personas </strong></div>
      <div class="p-2">

<!-- en el formulario colocar el atributo enctype para trabajar con imagenes -->

      <form class="row" action="guardar.php" method="POST"  enctype="multipart/form-data">

        <div class="col p-2">
          <label class="form-label"><strong>Nombre</strong></label>
          <input type="text" REQUIRED autocomplete="off" class="form-control" name="nombre">
        </div>


        <div class="col p-2">
          <label for="inputState" class="form-label">Nacionalidad</label>

        <!-- CARGAR EL SELECT CON LA BASE DE DATOS -->

          <select class="form-select" name="nacionalidad" REQUIRED>
            <option selected>Elegir...</option>
            <?php 
              $query = "SELECT * FROM nacionalidades";
              $resultado = mysqli_query($conn,$query);
              while($row = mysqli_fetch_array($resultado)){?>

              <option value="<?php echo $row['id_nacionalidad']?>"><?php echo $row['nacionalidad']?></option>
              <?php } ?>            
          </select>
        </div>

<div class="p-2">
  <label class="form-label"><strong>Sexo</strong></label><br>
  <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="sexo" value="masculino" REQUIRED>
  <label class="form-check-label" for="inlineRadio1">Masculino</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="sexo" value="femenino" REQUIRED>
  <label class="form-check-label" for="inlineRadio2">Femenino</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="sexo" value="indefinido" REQUIRED>
  <label class="form-check-label" for="inlineRadio3">Indefinido</label>
</div>
</div>


<div class="p-2">
<label class="form-label"><strong>Dosis</strong></label><br>


<div class="form-check form-check-inline">
<label class="form-check-label">
<!-- el atributo "name" referencia un array []   -->
<input class="form-radius-input" type="checkbox" name="dosis[]" value="dosis1">1° Dosis</label>  
</div>

<div class="form-check form-check-inline">
<label class="form-check-label"><input class="form-radius-input" type="checkbox" name="dosis[]" value="dosis2">2° Dosis</label>  
</div>    

<div class="form-check form-check-inline">
<label class="form-check-label"><input class="form-radius-input" type="checkbox" name="dosis[]" value="dosis3">3° Dosis</label>  
</div>        

</div> 
        

        <div class="col p-2">
          <label class="form-label">Foto</label>
          <br>

          <!-- input tipo FILE para guardar la imagen -->

          <input type="file" id="foto" name="foto" REQUIRED>
        </div>


        <div class="col p-2">
          <label class="form-label">Fecha de Nacimiento</label>
          <br>
          <input type="date" name="fecha_nac" REQUIRED>
        </div>


        <div class="d-grid gap-2 p-2">
          <button type="submit" class="btn btn-primary" name="insertar">Ingresar</button>
        </div>
      </form>
      </div>