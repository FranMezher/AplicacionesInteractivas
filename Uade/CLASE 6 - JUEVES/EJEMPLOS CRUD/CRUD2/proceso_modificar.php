<?php 
include "conectar/conexion.php";


if(isset($_POST['modificar'])){

if(empty($foto = $_FILES['foto']['name'])){

$id = $_REQUEST['id'];
$nombre = $_POST['nombre'];	
$sexo = $_POST['sexo'];
if(isset($_POST['dosis'])){
	$dosis = implode('/',$_POST['dosis']);
}
$nacionalidad = $_POST['nacionalidad'];
$fecha_nac = $_POST['fecha_nac'];

$query = "UPDATE personas SET nombre = '$nombre', id_nacionalidad = '$nacionalidad', sexo = '$sexo', dosis = '$dosis', fecha_nac = '$fecha_nac' WHERE id_persona = '$id'";
$resultado = mysqli_query($conn,$query);
header("Location:index.php");
	
}else{

$id = $_REQUEST['id'];
$nombre = $_POST['nombre'];	
$nacionalidad = $_POST['nacionalidad'];
$fecha_nac = $_POST['fecha_nac'];
$sexo = $_POST['sexo'];
if(isset($_POST['dosis'])){
	$dosis = implode('/',$_POST['dosis']);
}

$foto = $_FILES['foto'];
	print_r($_FILES['foto']);
	$img_loc = $_FILES['foto']['tmp_name'];
	$img_name = $_FILES['foto']['name'];
	$img_des = $img_name;
	move_uploaded_file($img_loc,'fotos/'.$img_name);

$query = "UPDATE personas SET nombre = '$nombre', id_nacionalidad = '$nacionalidad', sexo = '$sexo', dosis = '$dosis', foto = '$img_des', fecha_nac = '$fecha_nac' WHERE id_persona = '$id'";
$resultado = mysqli_query($conn,$query);
header("Location:index.php");
	
}
}
?>