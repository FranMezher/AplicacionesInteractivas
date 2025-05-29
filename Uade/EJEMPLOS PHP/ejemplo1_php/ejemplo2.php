<?php
    $productos = [
        [ "id" => 1, "nombre" => "Sansung", "precio" => 2500],
        [ "id" => 2, "nombre" => "Motorola", "precio" => 500],
        [ "id" => 3, "nombre" => "LC", "precio" => 95.99]
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Document</title>
</head>
<body>
<div class="products-container">
<?php if (count($productos) > 0) : ?>
        <h2 class="section-title">Productos :</h2>
        <div class="product-grid">
            <?php foreach($productos as $producto) { ?>
                <div class="product-card">
                    <span class="product-id"><?=$producto["id"]?></span>
                    <h3 class="product-name"><?=$producto['nombre']?></h3>
                    <p class="product-price">U$S<?=number_format($producto['precio'], 2 , ',', '.') ?> </p>
                </div>
            <?php } ?>
        </div>
    <?php else : ?>
        <p class="no-products-message">No hay productos</p>
    <?php endif; ?>
</div>

</body>
</html>