<?php
    $campos = [];
    foreach ($_GET as $key => $value) {
        if ($key !== 'sec') {
            $campos[$key] = $value;
        }
    }

    $labels = [
        'nombre'  => 'Nombre',
        'email'   => 'Correo electrónico',
        'asunto'  => 'Asunto',
        'mensaje' => 'Mensaje',
    ];
?>

<h1 class="page-title">Mensaje enviado</h1>

<div class="enviado-wrapper">

    <p class="enviado-msg">Gracias por escribirnos. Recibimos tu consulta y te responderemos pronto.</p>

    <div class="enviado-card">
        <?php foreach ($campos as $key => $value){ ?>
            <div class="enviado-row">
                <span class="enviado-label">
                    <?= htmlspecialchars($labels[$key] ?? ucfirst($key)); ?>
                </span>
                <span class="enviado-value">
                    <?= nl2br(htmlspecialchars($value)); ?>
                </span>
            </div>
        <?php } ?>
    </div>

    <a class="btn-back" href="?sec=inicio">← Volver al catálogo</a>

</div>