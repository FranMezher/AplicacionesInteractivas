<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
echo "Bienvenido, " . $_SESSION['usuario'];
echo '<br><a href="logout.php">Cerrar sesión</a>';
