<?php if (($currentPage ?? '') !== 'home'): ?>
<nav class="breadcrumb wrap" aria-label="Breadcrumb">
    <a href="./">Home</a>
    <span class="material-symbols-outlined" aria-hidden="true">chevron_right</span>
    <span aria-current="page"><?= htmlspecialchars($breadcrumbTitle ?? $pageTitle, ENT_QUOTES, 'UTF-8') ?></span>
</nav>
<?php endif; ?>
