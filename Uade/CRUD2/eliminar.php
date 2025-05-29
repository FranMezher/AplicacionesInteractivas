<?php   include "conexion.php";
$id = $_GET['id'];
$sql = "DELETE FROM productos WHERE id = '$id'";
mysqli_query($con, $sql);
header("Location: index.php");
