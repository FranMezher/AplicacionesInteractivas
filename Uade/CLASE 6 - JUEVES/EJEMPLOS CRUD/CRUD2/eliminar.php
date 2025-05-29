<?php 
include "conectar/conexion.php";

$id = $_GET['id'];

$query = "DELETE FROM personas WHERE id_persona = '$id'";
$resultado = mysqli_query($conn,$query);

header("Location:index.php");


 ?>