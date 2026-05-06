<?php
require_once ("classes/Producto.php");
$catalogoCompleto = Producto::catalogo_completo();

$categorias = Producto::todasLasCategorias();
?>
<h1>Incio</h1>
<div>
    <?php foreach($catalogoCompleto as $product){ ?>  <!-- Generealizar 😀 -->
        <div>
            <h5><?= $product->getNombre(); ?></h5>
            <h6><?= $product->getCategoria(); ?></h6>
            <p>
                <?= $product->getDescripcion(); ?>
            </p>
            <button><?= $product->getPrecio(); ?></button>
            <a href="?sec=producto&id=<?= $product->getId(); ?>">Ver detalles</a>
        </div>
</div><?php }; ?>
<div>
    <ul>
        <?php 
            foreach($categorias as $c){
            ?>
            <li class="nav-item">
                <a class="nav-link" href="?sec=filtro&filtro=<?= $c; ?>"><?= $c; ?></a>
            </li>
        <?php }?>
    </ul>
</div>