<?php 
include "conexion.php";

$id = $_GET['id'];

$query = "DELETE FROM autos WHERE id_auto = '$id'";
$resultado = mysqli_query($conn,$query);

header("Location:index.php");


 ?>