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
    <?php foreach ($opciones as $valor => $etiqueta): ?>
        <a class="<?= ($valor === $orden) ? 'active' : ''; ?>"
           <?= ($valor === $orden) ? 'aria-current="page"' : ''; ?>
           href="?sec=precio&orden=<?= $valor; ?>">
            <?= $etiqueta; ?>
        </a>
    <?php endforeach; ?>
</nav>

<div class="catalog-grid">
    <?php foreach($catalogoOrdenado as $product): ?>
        <div class="book-card">
            <figure class="book-card__figure">
                <img
                    src="<?= htmlspecialchars($images_root .'/portadas/'. $product->getImg()); ?>"
                    alt="Portada de <?= htmlspecialchars($product->getNombre()); ?>"
                    class="book-card__img"
                >
            </figure>
            <span class="book-card__category"><?= htmlspecialchars($product->getCategoria()); ?></span>
            <h5 class="book-card__title"><?= htmlspecialchars($product->getNombre()); ?></h5>
            <p class="book-card__desc"><?= htmlspecialchars($product->getDescripcion()); ?></p>
            <div class="book-card__footer">
                <span class="book-card__price">$<?= number_format($product->getPrecio(), 0, ',', '.'); ?></span>
                <a class="btn-detail" href="?sec=producto&id=<?= $product->getId(); ?>">Ver más</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
