<?php 
    require_once("classes/Producto.php");
    $id = isset($_GET["id"]) ? $_GET["id"] : null;
    
    if(is_null($id)){
        header("Location: ?sec=404");
        exit;
    }
    $producto = Producto::producto_x_id($id);

    if(!is_null($producto)){?>

    <h1 class="page-title">Detalle del libro</h1>

    <div class="product-detail">

        <?php 
            $item = $producto;
            require("components/product_picture.php"); 
        ?>

        <div class="product-detail-info">
            <p class="detail-category"><?= htmlspecialchars($producto->getCategoria()); ?></p>
            <h2><?= htmlspecialchars($producto->getNombre()); ?></h2>
            <hr>
            <p class="detail-desc"><?= htmlspecialchars($producto->getDescripcion()); ?></p>
            <div class="detail-price-row">
                <span class="detail-price">$<?= number_format($producto->getPrecio(), 0, ',', '.'); ?></span>
                <button id="btn-add-cart" class="btn-primary">Agregar al carrito</button>
            </div>
        </div>

    </div>

    <div id="toast-cart" class="toast-notification">
        ¡Producto agregado al carrito! 🛒
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btnCart = document.getElementById('btn-add-cart');
            const toast = document.getElementById('toast-cart');

            if(btnCart && toast) {
                btnCart.addEventListener('click', () => {
                    toast.classList.add('show');

                    setTimeout(() => {
                        toast.classList.remove('show');
                    }, 3000);

                });
            }
        });
    </script>

<?php }else{ ?>

    <div class="error-404">
        <span>404</span>
        <p>Producto no encontrado.</p>
        <a class="btn-back" href="?sec=inicio">← Volver al catálogo</a>
    </div>

<?php } ?>