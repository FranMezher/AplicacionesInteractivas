<?php
// Verificamos si se enviaron los datos por GET
if (isset($_GET['nombre']) && isset($_GET['edad'])) {
    $nombre = $_GET['nombre'];
    $edad = $_GET['edad'];

    echo "<h2>Datos recibidos:</h2>";
    echo $nombre; 
    echo "<br>";
    echo $edad;
} else {
    echo "No se enviaron datos.";
}

?>
