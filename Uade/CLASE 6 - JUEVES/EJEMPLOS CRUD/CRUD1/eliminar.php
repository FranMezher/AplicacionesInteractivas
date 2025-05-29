<?php 
include 'conexion.php';
$id = $_GET['id'];
$sql = "DELETE FROM personas WHERE id_persona = '$id'";
mysqli_query($con,$sql);
header("Location: index.php"); 



 ?>

