<?php
require_once ("classes/Producto.php");
$catalogoCompleto = Producto::catalogo_completo();
$categorias = Producto::todasLasCategorias();
?>

<h1 class="page-title">Catálogo</h1>

<div class="catalog-layout">

   <?php require("components/sidebar.php"); ?>

    <div class="catalog-grid">
        <?php foreach($catalogoCompleto as $product){
             require("components/book_card.php"); 
        } ?>
    </div>

</div>