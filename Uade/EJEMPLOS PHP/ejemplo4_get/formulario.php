<!DOCTYPE html>
<html>
<head>
    <title>Ejemplo GET en PHP</title>
</head>
<body>
    <h2>Formulario con método GET</h2>
    <form action="procesar.php" method="get">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">
        <br><br>
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad">
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
