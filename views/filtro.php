<?php
    require_once "classes/Producto.php";
    $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : '';

    $catalogoFiltrado = Producto::catalogo_x_categoria($filtro);

    $categorias = Producto::todasLasCategorias();
?>
<h1>Filtro por <?= $filtro;?></h1>

<ul>
    <?php
        foreach ($categorias as $c) { ?>
            <li>
                <a class="<?= ($c == $filtro) ? 'active' : ''; ?>" <?= ($c == $filtro) ? 'aria-current="page"' : ''; ?> href="?sec=filtro&filtro=<?= urlencode($c); ?>"><?= htmlspecialchars($c); ?></a>
            </li>
    <?php } ?>
</ul>

<div>
    <?php foreach($catalogoFiltrado as $product){ ?>
        <div>
            <h5><?= $product->getNombre(); ?></h5>
            <h6><?= $product->getCategoria(); ?></h6>
            <p>
                <?= $product->getDescripcion(); ?>
            </p>
            <button><?= $product->getPrecio(); ?></button>
        </div>
    <?php } ?>
</div>