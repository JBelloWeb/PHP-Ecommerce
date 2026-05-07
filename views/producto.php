<?php 
    require_once("classes/Producto.php");
    $id = isset($_GET["id"]) ? $_GET["id"] : null;
    
    if(is_null($id)){
        header("Location: ?sec=404");
        exit;
    }
    $producto = Producto::producto_x_id($id);

    if(!is_null($producto)): ?>

    <h1 class="page-title">Detalle del libro</h1>

    <div class="product-detail">

        <figure class="product-detail__figure">
            <img
                src="<?= htmlspecialchars($producto->getImg()); ?>"
                alt="Portada de <?= htmlspecialchars($producto->getNombre()); ?>"
                class="product-detail__img"
            >
        </figure>

        <div class="product-detail__info">
            <p class="product-detail__category"><?= htmlspecialchars($producto->getCategoria()); ?></p>
            <h2 class="product-detail__title"><?= htmlspecialchars($producto->getNombre()); ?></h2>
            <hr class="product-detail__divider">
            <p class="product-detail__desc"><?= htmlspecialchars($producto->getDescripcion()); ?></p>
            <div class="product-detail__price-row">
                <span class="product-detail__price">$<?= number_format($producto->getPrecio(), 0, ',', '.'); ?></span>
                <button class="btn-primary">Agregar al carrito</button>
            </div>
        </div>

    </div>

<?php else: ?>

    <div class="error-404">
        <span class="error-404__code">404</span>
        <p class="error-404__msg">Producto no encontrado.</p>
        <a class="btn-back" href="?sec=inicio">← Volver al catálogo</a>
    </div>

<?php endif; ?>
