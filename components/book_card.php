<div class="book-card">
    <?php
        $item = $product; 
        require("components/product_picture.php");
    ?>
    <span class="book-category"><?= htmlspecialchars($product->getCategoria()); ?></span>
    <h5><?= htmlspecialchars($product->getNombre()); ?></h5>
    <p><?= htmlspecialchars($product->getDescripcion()); ?></p>
    <div class="book-footer">
        <span class="book-price">$<?= number_format($product->getPrecio(), 0, ',', '.'); ?></span>
        <a class="btn-detail" href="?sec=producto&id=<?= $product->getId(); ?>">Ver más</a>
    </div>
</div>