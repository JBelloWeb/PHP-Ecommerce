<?php
    require_once "classes/Producto.php";
    $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : '';
    $catalogoFiltrado = Producto::catalogo_x_categoria($filtro);
    $categorias = Producto::todasLasCategorias();
?>

<h1 class="page-title">Categoría: <?= htmlspecialchars($filtro); ?></h1>

<nav class="filter-tabs">
    <?php foreach ($categorias as $c){ ?>
        <a class="<?= ($c == $filtro) ? 'active' : ''; ?>"
           <?= ($c == $filtro) ? 'aria-current="page"' : ''; ?>
           href="?sec=filtro&filtro=<?= urlencode($c); ?>">
            <?= htmlspecialchars($c); ?>
        </a>
    <?php } ?>
</nav>

<div class="catalog-grid">
    <?php foreach($catalogoFiltrado as $product){
        require("components/book_card.php"); 
    } ?>
</div>