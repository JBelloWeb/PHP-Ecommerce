<?php
    $cantidad = count($_GET);
    $names = array_keys($_GET);
    $valores = array_values($_GET);
    $campos = [];
    for($i=0; $i<$cantidad; $i++){
        if($names[$i] != "sec"){
            $campos[$names[$i]] = $valores[$i];
        }
    }
?>
<h1>Formulario Enviado</h1>
<div>
    <div>
        <div>
            <div>
            <?php
                foreach ($campos as $key => $value) {
                ?>
                <div>
                    <p><?= ucfirst($key); ?>:</p>
                    <p><?= $value; ?></p>
                </div>
                <?php
                }
            ?>
            </div>
        </div>
    </div>
</div>

