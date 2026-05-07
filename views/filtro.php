<?php
    require_once "classes/Producto.php";
    $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : '';
    $catalogoFiltrado = Producto::catalogo_x_categoria($filtro);
    $categorias = Producto::todasLasCategorias();
?>

<h1 class="page-title">Categoría: <?= htmlspecialchars($filtro); ?></h1>

<nav class="filter-tabs">
    <?php foreach ($categorias as $c): ?>
        <a class="<?= ($c == $filtro) ? 'active' : ''; ?>"
           <?= ($c == $filtro) ? 'aria-current="page"' : ''; ?>
           href="?sec=filtro&filtro=<?= urlencode($c); ?>">
            <?= htmlspecialchars($c); ?>
        </a>
    <?php endforeach; ?>
</nav>

<div class="catalog-grid">
    <?php foreach($catalogoFiltrado as $product): ?>
        <div class="book-card">
            <figure>
                <img
                    src="<?= htmlspecialchars($images_root . '/portadas/' . $product->getImg()); ?>"
                    alt="Portada de <?= htmlspecialchars($product->getNombre()); ?>"
                >
            </figure>
            <span class="book-category"><?= htmlspecialchars($product->getCategoria()); ?></span>
            <h5><?= htmlspecialchars($product->getNombre()); ?></h5>
            <p><?= htmlspecialchars($product->getDescripcion()); ?></p>
            <div class="book-footer">
                <span class="book-price">$<?= number_format($product->getPrecio(), 0, ',', '.'); ?></span>
                <a class="btn-detail" href="?sec=producto&id=<?= $product->getId(); ?>">Ver más</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>