<?php

session_start();

// Verifica si el usuario NO está logueado
if (!isset($_SESSION['usuario'])) {
    // Si no está logueado, redirige inmediatamente a la página de inicio (index.php)
    echo "<script language=javascript>location.href='index.php';</script>";
    die(); // Detiene la ejecución del script
}

// Configura las cabeceras para controlar el caché del navegador (mantenerlas es una buena práctica)
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Logout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script>
        // Script para prevenir el acceso a la página desde el historial del navegador
        window.addEventListener('pageshow', function (event) {
            // Verifica si la página se cargó desde la bfcache (back-forward cache)
            if (event.persisted) {
                // Si sí, recarga la página para forzar la verificación de la sesión en el servidor
                window.location.reload();
            }
        });

        // Opcional: Eliminar la página actual del historial después de cargarla
        // Esto puede ser más agresivo y a veces no es ideal para la experiencia del usuario
        // if (window.history && window.history.pushState) {
        //     window.history.pushState('forward', '', './pagina_actual.php'); // Reemplaza con el nombre de tu página
        // }
    </script>
</head>
<body>

    <div id="contenedor">
        <h2>Página Principal</h2>
        <button><a href="logout.php" name="salir">Salir</a></button>
    </div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>