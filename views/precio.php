<?php
    require_once "classes/Producto.php";
    $orden = isset($_GET['orden']) ? $_GET['orden'] : 'asc';
    $catalogoOrdenado = Producto::catalogo_x_precio($orden);

    $opciones = [
        'asc'  => 'Menor a mayor',
        'desc' => 'Mayor a menor',
    ];
?>

<h1 class="page-title">Precio: <?= $opciones[$orden]; ?></h1>

<nav class="filter-tabs">
    <?php foreach ($opciones as $valor => $etiqueta){ ?>
        <a class="<?= ($valor === $orden) ? 'active' : ''; ?>"
           <?= ($valor === $orden) ? 'aria-current="page"' : ''; ?>
           href="?sec=precio&orden=<?= $valor; ?>">
            <?= $etiqueta; ?>
        </a>
    <?php } ?>
</nav>

<div class="catalog-grid">
   <?php foreach($catalogoOrdenado as $product){
             require("components/book_card.php"); 
        } ?>
</div>
