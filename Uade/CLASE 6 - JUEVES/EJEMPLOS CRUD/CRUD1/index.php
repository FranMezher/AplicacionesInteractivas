<?php include "conexion.php" ;	
	$sql = "SELECT * FROM personas";
	$resultado = mysqli_query($con,$sql);
?>

<?php include "includes/header.php" ?>


<div class="container">
	<a class="btn btn-success m-3"  href="agregar.php" role="button">Nuevo</a>
	<div class="table-responsive">
	<table class="table table-bordered" id="myTable">
		<thead>
			<tr class="table-primary">
				<th>ID</th>
				<th>USUARIO</th>
				<th>MAIL</th>
				<th>ACCIONES</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($fila = mysqli_fetch_assoc($resultado)) {?>

			<!-- Este ciclo while recorre cada fila del resultado y lo guarda en la variable $fila que es un array asociativo (como un diccionario en python) -->

				<tr>
					<td><?php echo $fila['id_persona']; ?></td>
					<td><?php echo $fila['usuario'] ?></td>
					<td><?php echo $fila['mail'] ?></td>
					<td>
						<a href="editar.php?id=<?php echo $fila['id_persona']; ?>">Editar</a>

						<!-- el signo ? indica que id es una variable de tipo GET, y el id_persona es el identificador de la persona que se va a editar. -->

						<a href="eliminar.php?id=<?php echo $fila['id_persona'] ?>">Borrar</a>
					</td>
				</tr>	

			<?php  }?> 
		</tbody>
	</table>
	</div>
</div>

<?php include "includes/footer.php" ?>


