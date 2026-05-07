<?php
require_once ("classes/Producto.php");
$catalogoCompleto = Producto::catalogo_completo();
$categorias = Producto::todasLasCategorias();
?>

<h1 class="page-title">Catálogo</h1>

<div class="catalog-layout">

    <aside class="category-sidebar">
        <p class="sidebar-title">Categorías</p>
        <ul class="category-list">
            <?php foreach($categorias as $c): ?>
                <li>
                    <a href="?sec=filtro&filtro=<?= urlencode($c); ?>"><?= htmlspecialchars($c); ?></a>
                </li>
            <?php endforeach; ?>
        </ul>

        <p class="sidebar-title" style="margin-top: 1.5rem;">Precio</p>
        <ul class="category-list">
            <li><a href="?sec=precio&orden=asc">Menor a mayor</a></li>
            <li><a href="?sec=precio&orden=desc">Mayor a menor</a></li>
        </ul>
    </aside>

    <div class="catalog-grid">
        <?php foreach($catalogoCompleto as $product): ?>
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

</div>