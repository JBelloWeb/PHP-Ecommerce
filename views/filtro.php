<?php
    require_once "classes/Producto.php";
    $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : '';
    $catalogoFiltrado = Producto::catalogo_x_categoria($filtro);
    $categorias = Producto::todasLasCategorias();
?>

<h1 class="page-title">Categoría: <?= htmlspecialchars($filtro); ?></h1>

<nav class="filter-tabs">
    <?php foreach ($categorias as $c) { ?>
        <a class="<?= ($c == $filtro) ? 'active' : ''; ?>"
           <?= ($c == $filtro) ? 'aria-current="page"' : ''; ?>
           href="?sec=filtro&filtro=<?= urlencode($c); ?>">
            <?= htmlspecialchars($c); ?>
        </a>
    <?php } ?>
</nav>

<div class="catalog-grid">
    <?php foreach($catalogoFiltrado as $product){ ?>
        <div class="book-card">
            <span class="book-card__category"><?= $product->getCategoria(); ?></span>
            <h5 class="book-card__title"><?= $product->getNombre(); ?></h5>
            <p class="book-card__desc"><?= $product->getDescripcion(); ?></p>
            <div class="book-card__footer">
                <span class="book-card__price"><?= number_format($product->getPrecio(), 0, ',', '.'); ?></span>
                <a class="btn-detail" href="?sec=producto&id=<?= $product->getId(); ?>">Ver más</a>
            </div>
        </div>
    <?php } ?>
</div>
