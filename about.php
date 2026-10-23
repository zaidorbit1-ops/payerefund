<?php
$pageTitle = 'About Us | PAYE Refund Ireland';
$currentPage = 'about';
$breadcrumbTitle = 'About';
$heroVariant = 'about';
$processImages = [
    ['file' => 'abt1.png', 'alt' => 'A client discussing their PAYE tax review with an adviser', 'label' => 'Personal guidance through your tax review'],
    ['file' => 'abt2.png', 'alt' => 'An adviser carefully reviewing tax records and supporting information', 'label' => 'A careful review of your tax records'],
];
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/hero-slider.php';
require __DIR__ . '/includes/benefits-marquee.php';
?>
<main id="main-content">
    <section class="page-banner"><div class="wrap reveal"><span class="eyebrow eyebrow-light">Official accountancy-led support</span><h1>Irish PAYE tax support from an established accountancy company</h1><p>PAYE Refund is provided by ACCTS &amp; TECHS LIMITED, with clear company, fee and process information.</p></div></section>
    <section class="about-overview-section">
        <div class="wrap about-overview">
            <div class="about-overview-copy reveal">
                <span class="eyebrow">Who we are</span>
                <h2>Established, accountable support.</h2>
                <p>PAYE Refund is a service provided by ACCTS &amp; TECHS LIMITED, an Irish accountancy and tax advisory company. We guide PAYE workers through the Irish tax system with transparency and care.</p>
                <p>Our team reviews relevant tax credits and reliefs and prepares accurate Income Tax Returns and refund claims where instructed.</p>
                <div class="stat-grid">
                    <div class="stat-card"><strong>400+</strong><span>Clients supported by ACCTS &amp; TECHS LIMITED</span></div>
                    <div class="stat-card"><strong>4 core</strong><span>Accounting, taxation, business advisory and corporate services</span></div>
                </div>
            </div>
            <aside class="about-principles reveal" aria-label="Our service approach">
                <div class="about-principles-heading">
                    <span class="about-principles-icon material-symbols-outlined" aria-hidden="true">assured_workload</span>
                    <span class="about-principles-label">Our approach</span>
                </div>
                <h3>Clear advice. Careful reviews.</h3>
                <p>Professional support grounded in accuracy, transparency and personal service.</p>
                <ul>
                    <li><span class="material-symbols-outlined" aria-hidden="true">fact_check</span><span>Review relevant PAYE credits and reliefs</span></li>
                    <li><span class="material-symbols-outlined" aria-hidden="true">description</span><span>Prepare returns where instructed</span></li>
                    <li><span class="material-symbols-outlined" aria-hidden="true">account_balance</span><span>Revenue pays any refund directly to you</span></li>
                </ul>
                <a href="services" class="about-principles-link">Explore our services <span class="material-symbols-outlined" aria-hidden="true">arrow_forward</span></a>
            </aside>
            <p class="company-address about-company-address"><span class="material-symbols-outlined" aria-hidden="true">location_on</span><span><strong>ACCTS &amp; TECHS LIMITED</strong><br>Company no. 494758 · Registered office: Unit F13, Maynooth Business Campus, Co. Kildare, Ireland.</span></p>
        </div>
    </section>
    <section class="section section-muted" id="leadership"><div class="wrap">
        <div class="section-heading reveal"><div><span class="eyebrow">Leadership</span><h2>Meet your tax adviser</h2><p>Expert financial stewardship backed by professional qualifications.</p></div></div>
        <article class="adviser-card reveal">
            <figure class="adviser-profile">
                <img class="adviser-photo" src="<?= htmlspecialchars(assetUrl('assets/images/Amir.png'), ENT_QUOTES, 'UTF-8') ?>" alt="Amir Mirza, Director and Tax Adviser" loading="lazy">
                <figcaption class="adviser-profile-label">Director &amp; Tax Adviser</figcaption>
            </figure>
            <div class="adviser-details">
                <span class="eyebrow">Your tax adviser</span>
                <h3>Amir Mirza</h3>
                <p class="adviser-intro">Clear, practical tax guidance from an experienced Irish accountancy professional, with a focus on accuracy, transparency and personal service.</p>
                <div class="adviser-credentials">
                    <div>
                        <span class="material-symbols-outlined" aria-hidden="true">workspace_premium</span>
                        <div><h4>Professional qualifications</h4><p>Certified Public Accountants  | CPA<br>Chartered Accountants in England and Wales | ICAEW</p></div>
                    </div>
                    <div>
                        <span class="material-symbols-outlined" aria-hidden="true">query_stats</span>
                        <div><h4>Specialist expertise</h4><p>PAYE tax reviews, identification of eligible tax credits and reliefs, and preparation of Income Tax Returns and tax refund claims.</p></div>
                    </div>
                </div>
            </div>
        </article>
    </div></section>
    <section class="section wrap"><div class="notice notice-blue reveal"><div><h2>Independent service</h2><p>Private tax advisory service, not part of, endorsed by, or affiliated with Revenue Commissioners. You can complete your own review via myAccount.</p></div><a class="button button-dark" href="https://www.ros.ie" target="_blank" rel="noopener noreferrer">Visit myAccount</a></div></section>
    <section class="section section-muted"><div class="wrap"><div class="section-heading reveal"><div><span class="eyebrow">How it works</span><h2>Our four-step process</h2><p>A streamlined, transparent pathway designed to review your PAYE records.</p></div></div>
        <div class="about-process-gallery">
            <?php foreach ($processImages as $image): ?>
                <figure class="about-process-image reveal">
                    <?php if (is_file(__DIR__ . '/assets/images/' . $image['file'])): ?>
                        <img src="<?= htmlspecialchars(assetUrl('assets/images/' . $image['file']), ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($image['alt'], ENT_QUOTES, 'UTF-8') ?>" width="1200" height="675" loading="lazy">
                    <?php else: ?>
                        <div class="about-process-image-placeholder" role="img" aria-label="<?= htmlspecialchars($image['alt'], ENT_QUOTES, 'UTF-8') ?>">
                            <span class="material-symbols-outlined" aria-hidden="true">add_photo_alternate</span>
                            <span><?= htmlspecialchars($image['file'], ENT_QUOTES, 'UTF-8') ?> will appear here</span>
                        </div>
                    <?php endif; ?>
                    <figcaption><?= htmlspecialchars($image['label'], ENT_QUOTES, 'UTF-8') ?></figcaption>
                </figure>
            <?php endforeach; ?>
        </div>
        <div class="card-grid card-grid-4"><article class="step-card reveal"><span class="step-icon material-symbols-outlined" aria-hidden="true">looks_one</span><h3>Initial refund check</h3><p>We assess your preliminary details to determine potential tax back eligibility.</p></article><article class="step-card reveal"><span class="step-icon material-symbols-outlined" aria-hidden="true">looks_two</span><h3>Review and records</h3><p>Detailed examination of employment records, expenses, and reliefs.</p></article><article class="step-card reveal"><span class="step-icon material-symbols-outlined" aria-hidden="true">looks_3</span><h3>Your approval</h3><p>You review the final calculations and authorise submission of the claim.</p></article><article class="step-card reveal"><span class="step-icon material-symbols-outlined" aria-hidden="true">looks_4</span><h3>Revenue decision</h3><p>Revenue processes the return and issues any refund directly to you.</p></article></div>
    </div></section>
    <section class="section wrap"><div class="section-heading reveal"><div><span class="eyebrow">Our commitments</span><h2>Why choose us</h2><p>Professional guarantees built around client security and clear value.</p></div></div><div class="card-grid card-grid-3"><article class="info-card reveal"><span class="icon-tile material-symbols-outlined" aria-hidden="true">payments</span><h3>Clear fixed fee</h3><p>No hidden percentages or surprise charges. Transparent flat pricing.</p></article><article class="info-card reveal"><span class="icon-tile material-symbols-outlined" aria-hidden="true">account_balance_wallet</span><h3>Refund paid to you</h3><p>All approved refunds are paid directly from Revenue to you.</p></article><article class="info-card reveal"><span class="icon-tile material-symbols-outlined" aria-hidden="true">lock</span><h3>Secure document guidance</h3><p>Encrypted, professional channels for sharing sensitive financial records.</p></article><article class="info-card reveal"><span class="icon-tile material-symbols-outlined" aria-hidden="true">fact_check</span><h3>Balanced review</h3><p>Comprehensive checks covering available tax credits and allowances.</p></article><article class="info-card reveal"><span class="icon-tile material-symbols-outlined" aria-hidden="true">event</span><h3>Four-year awareness</h3><p>We flag statutory lookback windows so entitlements can be reviewed promptly.</p></article><article class="info-card reveal"><span class="icon-tile material-symbols-outlined" aria-hidden="true">support_agent</span><h3>Follow-up support</h3><p>Dedicated assistance throughout the agreed lifecycle of your application.</p></article></div></section>
</main>
<?php require __DIR__ . '/includes/cta.php'; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>
