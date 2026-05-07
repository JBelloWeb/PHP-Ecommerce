<?php 
    require_once("classes/Secciones.php");
    $secciones = Secciones::secciones_del_sitio();
?>

<header class="site-header">
    <nav>
        <div class="nav-wrapper">
            <a class="nav-brand" href="?sec=inicio">Sempere e Hijos</a>

            <button class="nav-toggle" onclick="this.nextElementSibling.classList.toggle('open')" aria-label="Menú">
                <span></span><span></span><span></span>
            </button>

            <ul class="nav-list">
                <?php
                    foreach($secciones as $value){
                        if($value->getInMenu()){
                            ?>
                                <li>
                                    <a href="?sec=<?= $value->getVinculo(); ?>"><?= $value->getTexto(); ?></a>
                                </li>
                            <?php
                        }
                    }
                ?>
            </ul>
        </div>
    </nav>
</header>
