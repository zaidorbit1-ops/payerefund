<?php
if (!headers_sent()) {
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
}

if (!function_exists('assetUrl')) {
    function assetUrl(string $path): string
    {
        $filePath = dirname(__DIR__) . DIRECTORY_SEPARATOR . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $path);
        if (!is_file($filePath)) {
            return $path . '?v=missing';
        }

        $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
        $version = in_array($extension, ['css', 'js'], true)
            ? hash_file('sha256', $filePath)
            : filemtime($filePath) . '-' . filesize($filePath);

        return $path . '?v=' . rawurlencode($version);
    }
}

$pageTitle = $pageTitle ?? 'PAYE Refund Ireland';
$currentPage = $currentPage ?? '';
$navItems = [
    'home' => ['Home', './'],
    'about' => ['About', 'about'],
    'services' => ['Services', 'services'],
    'faqs' => ['FAQs', 'faqs'],
    'contact' => ['Contact', 'contact'],
];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0b2538">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="<?= htmlspecialchars(assetUrl('assets/css/style.css'), ENT_QUOTES, 'UTF-8') ?>">
    <script src="<?= htmlspecialchars(assetUrl('assets/js/main.js'), ENT_QUOTES, 'UTF-8') ?>" defer></script>
    <style>
        .hero-visual::before { background-image: url("<?= htmlspecialchars(assetUrl('assets/images/slider.png'), ENT_QUOTES, 'UTF-8') ?>"); }
        .hero-slider-about .hero-visual::before { background-image: url("<?= htmlspecialchars(assetUrl('assets/images/about-slider.png'), ENT_QUOTES, 'UTF-8') ?>"); }
    </style>
</head>
<body>
<a class="skip-link" href="#main-content">Skip to content</a>
<header class="site-header">
    <div class="header-topbar">
        <div class="header-topbar-inner">
            <p><span class="material-symbols-outlined" aria-hidden="true">verified</span> Clear, accountable PAYE tax support from an established Irish company</p>
            <div class="header-contact-links">
                <a href="tel:+35345254213"><span class="material-symbols-outlined" aria-hidden="true">call</span><span>045 254 213</span></a>
                <a href="mailto:info@payerefund.ie"><span class="material-symbols-outlined" aria-hidden="true">mail</span><span>info@payerefund.ie</span></a>
            </div>
        </div>
    </div>
    <div class="header-inner">
        <a class="brand" href="./" aria-label="PAYE Refund home">
            <img src="<?= htmlspecialchars(assetUrl('assets/images/logo.png'), ENT_QUOTES, 'UTF-8') ?>" alt="PAYE Refund" width="160" height="48">
        </a>
        <button class="menu-toggle" type="button" aria-label="Open navigation" aria-expanded="false" aria-controls="primary-navigation">
            <span class="material-symbols-outlined" aria-hidden="true">menu</span>
        </button>
        <nav class="primary-navigation" id="primary-navigation" aria-label="Main navigation">
            <?php foreach ($navItems as $key => [$label, $url]): ?>
                <a href="<?= htmlspecialchars($url, ENT_QUOTES, 'UTF-8') ?>"<?= $currentPage === $key ? ' aria-current="page"' : '' ?>>
                    <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?>
                </a>
            <?php endforeach; ?>
        </nav>
        <a class="button button-dark header-cta" href="contact#contact-details">Start My Refund Check <span class="material-symbols-outlined" aria-hidden="true">arrow_forward</span></a>
    </div>
</header>
