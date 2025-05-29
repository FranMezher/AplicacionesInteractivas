<?php
    $flaco = 'Hola Flaco, como estas?';
    $usuarios = ['Juan','Luis','Ana'];
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1><?php echo $flaco ?>

<h2><?=$flaco?></h2>

<h2>Usuarios:</h2>
<ul>
    <?php foreach($usuarios as $usuario) { ?>

        <li><?=$usuario?></li>


    <?php } ?>
    
</ul>

</h1>
    
</body>
</html>