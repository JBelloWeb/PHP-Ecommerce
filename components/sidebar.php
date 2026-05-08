<aside class="category-sidebar">
    <p class="sidebar-title">Categorías</p>
    <ul class="category-list">
        <?php foreach($categorias as $c): ?>
            <li>
                <a href="?sec=filtro&filtro=<?= urlencode($c); ?>"><?= htmlspecialchars($c); ?></a>
            </li>
        <?php endforeach; ?>
    </ul>

    <p class="sidebar-title" style="margin-top: 1.5rem;">Precio</p>
    <ul class="category-list">
        <li><a href="?sec=precio&orden=asc">Menor a mayor</a></li>
        <li><a href="?sec=precio&orden=desc">Mayor a menor</a></li>
    </ul>
</aside>