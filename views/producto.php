<?php 
    require_once("classes/Producto.php");
    $id = isset($_GET["id"]) ? $_GET["id"] : null;
    
    if(is_null($id)){
        header("Location: ?sec=404");
    }
    $producto = Producto::producto_x_id($id);

    if(!is_null($producto)){
        ?>
        <div>
            <h5><?= $producto->getNombre(); ?></h5>
            <h6><?= $producto->getCategoria(); ?></h6>
            <p>
                <?= $producto->getDescripcion(); ?>
            </p>
            <button><?= $producto->getPrecio(); ?></button>
        </div>
    <?php } else {
        ?>
        <h5>Producto no encontrado</h5>
        <?php
    }
?>