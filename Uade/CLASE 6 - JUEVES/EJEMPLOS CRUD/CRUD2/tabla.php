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
              <td><?php echo $row['dosis']; ?></td>

              <td><?php echo $row['fecha_nac']; ?></td>
              <td><a class="btn btn-warning" href="modificar.php?id=<?php echo $row['id_persona'];?>">Modificar</a></td>
              <td><a class="btn btn-danger" href="eliminar.php?id=<?php echo $row['id_persona'];?>">Eliminar</a></td>
            </tr>

          <?php } ?>
        </tbody>
      </table>
 