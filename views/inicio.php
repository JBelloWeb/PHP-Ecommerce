<?php
require_once ("classes/Producto.php");
$catalogoCompleto = Producto::catalogo_completo();
$categorias = Producto::todasLasCategorias();
?>

<h1 class="page-title">Catálogo</h1>

<div class="catalog-layout">

    <aside class="category-sidebar">
        <p class="category-sidebar__title">Categorías</p>
        <ul class="category-list">
            <?php foreach($categorias as $c){ ?>
                <li>
                    <a href="?sec=filtro&filtro=<?= urlencode($c); ?>"><?= htmlspecialchars($c); ?></a>
                </li>
            <?php } ?>
        </ul>
    </aside>

    <div class="catalog-grid">
        <?php foreach($catalogoCompleto as $product){ ?>
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

</div>
