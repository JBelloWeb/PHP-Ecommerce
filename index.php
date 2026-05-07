<?php
    require_once("funcs/config.php");
    require_once("classes/Secciones.php");

    $secciones_menu = Secciones::secciones_menu(); 
    $secciones = Secciones::secciones_del_sitio(); 
    $seccion_solicitada = isset($_GET['sec']) ? $_GET['sec'] : 'inicio';

    $view = '404';
    $seccion_title = 'Página no encontrada';

    foreach ($secciones as $value) {
        if($value->getVinculo() == $seccion_solicitada){
            $view = $seccion_solicitada; 
            $seccion_title = $value->getTitle(); 
            break; 
        }
    }
?>

<!DOCTYPE html>
<html lang="es-AR">
    <?php require_once ("layout/head.php");?>
<body>
    <?php require_once ("layout/header.php");?>
    <main>
        <?php require_once("views/$view.php")?>
    </main>
    <?php require_once ("layout/footer.php");?>
</body>
</html>