<?php 
    require_once("classes/Secciones.php");
    $secciones = Secciones::secciones_del_sitio();
?>

<header>
    <nav>
        <div>
            <a href="?sec=inicio">Parcial 1</a>
            <ul>
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

    <?php
        foreach($secciones as $value){
            if($value->getInMenu()){
                ?>
                    <li><a href="?sec=<?= $value->getVinculo(); ?>"><?= $value->getTexto(); ?></a></li>
                <?php
            }
        }
    ?>
</header>