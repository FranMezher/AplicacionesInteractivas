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

				<tr>
					<td><?php echo $fila['id_persona']; ?></td>
					<td><?php echo $fila['usuario'] ?></td>
					<td><?php echo $fila['mail'] ?></td>
					<td>
						<a href="editar.php?id=<?php echo $fila['id_persona']; ?>">Editar</a>
						<a href="eliminar.php?id=<?php echo $fila['id_persona'] ?>">Borrar</a>
					</td>
				</tr>	

			<?php  }?> 
		</tbody>
	</table>
	</div>
</div>

<?php include "includes/footer.php" ?>


