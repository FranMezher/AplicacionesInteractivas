<?php
if (!empty($_FILES)) {
    $nombreArchivo = $_FILES['file']['name'];
    $rutaTemporal = $_FILES['file']['tmp_name'];
    $destino = "../img/" . $nombreArchivo;

    if (move_uploaded_file($rutaTemporal, $destino)) {
        echo json_encode(['status' => 'ok', 'archivo' => $nombreArchivo]);
    } else {
        echo json_encode(['status' => 'error']);
    }
} else {
    echo json_encode(['status' => 'no_file']);
}
?>
