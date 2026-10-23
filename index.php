<?php
$pageTitle = 'PAYE Refund Ireland - Clear PAYE Tax Support';
$currentPage = 'home';
require __DIR__ . '/includes/header.php';
?>
<main id="main-content">
    <?php require __DIR__ . '/includes/hero-slider.php'; ?>
    <?php require __DIR__ . '/includes/benefits-marquee.php'; ?>

    <section class="trust-strip">
        <div class="wrap trust-grid">
            <div><span class="material-symbols-outlined" aria-hidden="true">payments</span><p><strong>Transparent fee</strong><br>€150 plus VAT per person, per year</p></div>
            <div><span class="material-symbols-outlined" aria-hidden="true">verified_user</span><p><strong>Contingent pricing</strong><br>No fee unless Revenue issues a refund</p></div>
            <div><span class="material-symbols-outlined" aria-hidden="true">account_balance</span><p><strong>Direct payouts</strong><br>Revenue pays your refund to you</p></div>
            <div><span class="material-symbols-outlined" aria-hidden="true">lock</span><p><strong>Data protection</strong><br>Secure, guided document sharing</p></div>
        </div>
    </section>

    <section class="section wrap">
        <div class="section-heading reveal">
            <div><span class="eyebrow">Tax credits &amp; reliefs</span><h2>What we review</h2></div>
            <a class="text-link" href="services">View all services <span class="material-symbols-outlined" aria-hidden="true">arrow_forward</span></a>
        </div>
        <div class="card-grid card-grid-3">
            <article class="info-card review-card reveal"><img class="review-card-image" src="<?= htmlspecialchars(assetUrl('assets/images/home1.png'), ENT_QUOTES, 'UTF-8') ?>" alt="Medical and dental tax relief" loading="lazy"><h3>Medical and dental</h3><p>Review potentially qualifying expenses including non-routine dental treatments, consultant visits, and prescription costs.</p><span class="card-note">Relief up to 20% standard rate</span></article>
            <article class="info-card review-card reveal"><img class="review-card-image" src="<?= htmlspecialchars(assetUrl('assets/images/home2.png'), ENT_QUOTES, 'UTF-8') ?>" alt="Rent Tax Credit" loading="lazy"><h3>Rent Tax Credit</h3><p>Check whether qualifying rent payments for private rented accommodation, student accommodation, or parent-paid rent apply.</p><span class="card-note">Up to €1,000 per year</span></article>
            <article class="info-card review-card reveal"><img class="review-card-image" src="<?= htmlspecialchars(assetUrl('assets/images/home3.png'), ENT_QUOTES, 'UTF-8') ?>" alt="Remote working tax relief" loading="lazy"><h3>Remote working</h3><p>Review qualifying utility costs for designated days worked from home under Irish tax rules.</p><span class="card-note">Pro-rata daily relief</span></article>
        </div>
    </section>

    <section class="section section-muted" id="how-it-works">
        <div class="wrap">
            <div class="section-heading reveal"><div><span class="eyebrow">Simple process</span><h2>Four clear steps</h2><p>Our structured procedure ensures your review is handled accurately and securely.</p></div></div>
            <div class="card-grid card-grid-4">
                <article class="step-card reveal"><span class="step-icon material-symbols-outlined" aria-hidden="true">looks_one</span><h3>Complete the initial form</h3><p>Submit basic details securely, without sending sensitive tax login information.</p></article>
                <article class="step-card reveal"><span class="step-icon material-symbols-outlined" aria-hidden="true">looks_two</span><h3>We review your circumstances</h3><p>Our professional team analyses your records against potential credits and reliefs.</p></article>
                <article class="step-card reveal"><span class="step-icon material-symbols-outlined" aria-hidden="true">looks_3</span><h3>You approve the submission</h3><p>Review our findings and authorise any submission of your Income Tax Return.</p></article>
                <article class="step-card reveal"><span class="step-icon material-symbols-outlined" aria-hidden="true">looks_4</span><h3>Revenue processes the return</h3><p>Revenue issues approved refunds directly to your nominated bank account.</p></article>
            </div>
            <p class="notice"><strong>Important disclaimer:</strong> A review may identify a refund, no change or an underpayment. No refund or processing time can be guaranteed.</p>
        </div>
    </section>

    <section class="section wrap">
        <div class="pricing-panel reveal">
            <div><span class="eyebrow">Fixed fee</span><h2>€150 plus VAT per person, per year</h2><p>Payable only where Revenue issues a refund. Invoiced separately, never deducted from your Revenue payment.</p><span class="card-note">✓ No hidden fees &nbsp; ✓ Separate invoicing</span></div>
            <div class="price-box"><span>Professional fee - per person, per year</span><strong>€150 + VAT</strong><p>Payable only where Revenue issues a refund.</p><a class="button button-dark" href="contact#contact-details">Get started today</a></div>
        </div>
    </section>

    <section class="section section-muted">
        <div class="wrap reveal"><span class="eyebrow">Important timing</span><h2>Claims are generally limited to four years</h2><p class="narrow">Revenue generally requires refund claims to be made within four years after the end of the relevant tax year. Ensure older entitlements are reviewed promptly before they expire.</p></div>
    </section>

    <section class="section wrap">
        <div class="section-heading reveal" id="official-information"><div><span class="eyebrow">Official guidance</span><h2>Useful public information</h2><p>These links go directly to official Irish sources. Linking does not imply endorsement of PAYE Refund.</p></div></div>
        <div class="card-grid card-grid-3">
            <a class="info-card resource-card reveal" href="https://www.revenue.ie/en/jobs-and-pensions/end-of-year-process/paye-income-tax-return.aspx" target="_blank" rel="noopener noreferrer"><span class="icon-tile material-symbols-outlined" aria-hidden="true">description</span><h3>PAYE Income Tax Return</h3><p>Revenue guidance on reviewing and submitting a PAYE Income Tax Return.</p><span class="text-link">Visit Revenue <span class="material-symbols-outlined" aria-hidden="true">north_east</span></span></a>
            <a class="info-card resource-card reveal" href="https://www.revenue.ie/en/jobs-and-pensions/tax-agent-tax-service/index.aspx" target="_blank" rel="noopener noreferrer"><span class="icon-tile material-symbols-outlined" aria-hidden="true">verified_user</span><h3>Using a tax agent</h3><p>Revenue information on agents, authorisation and protecting your myAccount login details.</p><span class="text-link">Visit Revenue <span class="material-symbols-outlined" aria-hidden="true">north_east</span></span></a>
            <a class="info-card resource-card reveal" href="https://www.dataprotection.ie/en/individuals/rights-individuals-under-general-data-protection-regulation" target="_blank" rel="noopener noreferrer"><span class="icon-tile material-symbols-outlined" aria-hidden="true">shield_lock</span><h3>Your data rights</h3><p>Data Protection Commission guidance on individual rights under GDPR.</p><span class="text-link">Visit the DPC <span class="material-symbols-outlined" aria-hidden="true">north_east</span></span></a>
        </div>
    </section>
    <section class="section section-muted">
        <div class="wrap">
            <div class="section-heading reveal"><div><span class="eyebrow">Editorial insights</span><h2>From the PAYE Refund blog</h2></div></div>
            <div class="card-grid card-grid-3">
                <article class="info-card editorial-card reveal"><span class="eyebrow">Health expenses</span><h3>Claiming health &amp; dental expenses: what qualifies?</h3><p>A comprehensive look at non-routine dental, consultant fees, and how to understand potential relief claims.</p></article>
                <article class="info-card editorial-card reveal"><span class="eyebrow">Rent Tax Credit</span><h3>Understanding the Rent Tax Credit in Ireland</h3><p>Reviewing private renters’ potential eligibility and the information that may be needed to support a claim.</p></article>
                <article class="info-card editorial-card reveal"><span class="eyebrow">Remote working</span><h3>Remote working relief: claiming utility costs</h3><p>How to review qualifying electricity, heating, and broadband expenses for eligible work-from-home days.</p></article>
            </div>
        </div>
    </section>
</main>
<?php require __DIR__ . '/includes/cta.php'; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>
