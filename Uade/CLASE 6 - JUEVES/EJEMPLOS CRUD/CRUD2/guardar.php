<?php 
include "conectar/conexion.php";


if(isset($_POST['insertar'])){
$nombre = $_POST['nombre'];
$nacionalidad = $_POST['nacionalidad'];
$sexo = $_POST['sexo'];	




//  La función implode() toma un array  $_POST['dosis'] y lo convierte en una cadena de texto. Cada elemento del array se une en una sola cadena utilizando el carácter '/' como separador. Esto significa que los valores seleccionados se combinarán en una sola cadena, separados por barras (/) y se almacena en la variable $dosis

if(isset($_POST['dosis'])){
	$dosis = implode('/',$_POST['dosis']);
}


//  El array $_FILES contiene información sobre los archivos cargados mediante un formulario HTML.

//  La clave 'foto' hace referencia al nombre del campo del archivo en el formulario (por ejemplo, <input type="file" name="foto">).

// El array $_FILES['foto'] contiene varias propiedades importantes:

// $_FILES['foto']['name']: El nombre original del archivo en el sistema del usuario.
// $_FILES['foto']['type']: El tipo MIME (standar para manejar archivos en la web) del archivo (por ejemplo, image/jpeg).
// $_FILES['foto']['tmp_name']: La ubicación temporal del archivo en el servidor.
// $_FILES['foto']['error']: Un código de error asociado con la carga del archivo.
// $_FILES['foto']['size']: El tamaño del archivo en bytes

// print_r($_FILES['foto']);
// imprime en pantalla toda la información contenida en el array $_FILES['foto'], 


$foto = $_FILES['foto'];
print_r($_FILES['foto']);
$img_loc = $_FILES['foto']['tmp_name'];
$img_name = $_FILES['foto']['name'];
$img_des = "fotos/".$img_name;
move_uploaded_file($img_loc,'fotos/'.$img_name);

// La función move_uploaded_file() mueve el archivo desde su ubicación temporal (almacenada en $img_loc) hasta la carpeta de destino (fotos/).



$fecha_nac = $_POST['fecha_nac'];


	$query = "INSERT INTO personas (nombre,id_nacionalidad,sexo,dosis,foto,fecha_nac)VALUES('$nombre','$nacionalidad','$sexo','$dosis', '$img_name','$fecha_nac')";

	$resultado = mysqli_query($conn,$query);

	header("Location:index.php");
}
?>