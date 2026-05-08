<figure>
    <picture>
        <source media="(min-width: 901px)" srcset="<?= htmlspecialchars($images_root . '/portadas/lg/' . $item->getImg()); ?>">
        
        <source media="(min-width: 641px)" srcset="<?= htmlspecialchars($images_root . '/portadas/md/' . $item->getImg()); ?>">
        
        <img
            src="<?= htmlspecialchars($images_root . '/portadas/sm/' . $item->getImg()); ?>"
            alt="Portada de <?= htmlspecialchars($item->getNombre()); ?>"
        >
    </picture>
</figure>