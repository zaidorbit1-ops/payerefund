<section class="hero-slider<?= ($heroVariant ?? 'home') === 'about' ? ' hero-slider-about' : '' ?>" data-hero-variant="<?= htmlspecialchars($heroVariant ?? 'home', ENT_QUOTES, 'UTF-8') ?>" aria-label="PAYE refund support">
    <div class="hero-copy-panel">
        <div class="hero-text-decoration is-changing" aria-hidden="true">
            <span class="hero-orbit hero-orbit-one"></span>
            <span class="hero-orbit hero-orbit-two"></span>
            <span class="hero-orbit-dot"></span>
        </div>
        <div class="hero-content is-entering">
            <span class="eyebrow eyebrow-light" id="hero-eyebrow">Irish PAYE tax support</span>
            <h1 id="hero-title" aria-live="off" aria-label="Clear Irish PAYE tax support backed by experienced accountants."></h1>
            <p id="hero-description">PAYE Refund is provided by ACCTS &amp; TECHS LIMITED. We help PAYE workers review tax records, identify potentially unclaimed credits and reliefs, and prepare accurate Income Tax Returns for submission to Revenue where instructed.</p>
            <ul class="hero-highlights" id="hero-highlights" aria-label="Service highlights">
                <li><span class="material-symbols-outlined" aria-hidden="true">verified</span> Independent Irish accountancy support</li>
                <li><span class="material-symbols-outlined" aria-hidden="true">payments</span> €150 + VAT per person, per year, only if Revenue issues a refund</li>
            </ul>
            <div class="hero-actions">
                <a class="button button-gold" id="hero-primary-link" href="contact#contact-details">Start My Refund Check</a>
                <a class="button button-outline-light" id="hero-secondary-link" href="#how-it-works">See how it works</a>
            </div>
        </div>
    </div>
    <div class="hero-visual">
        <div class="slider-controls" aria-label="Slider controls">
            <button class="slider-arrow" type="button" data-slide-prev aria-label="Previous message"><span class="material-symbols-outlined" aria-hidden="true">arrow_back</span></button>
            <div class="slider-dots" role="tablist" aria-label="Choose a message">
                <button class="slider-dot is-active" type="button" role="tab" aria-label="Show message 1" aria-selected="true" data-slide-to="0"></button>
                <button class="slider-dot" type="button" role="tab" aria-label="Show message 2" aria-selected="false" data-slide-to="1"></button>
                <button class="slider-dot" type="button" role="tab" aria-label="Show message 3" aria-selected="false" data-slide-to="2"></button>
            </div>
            <button class="slider-arrow" type="button" data-slide-next aria-label="Next message"><span class="material-symbols-outlined" aria-hidden="true">arrow_forward</span></button>
            <button class="slider-play" type="button" aria-label="Pause message autoplay" aria-pressed="false" data-slider-toggle><span class="material-symbols-outlined" aria-hidden="true">pause</span></button>
        </div>
    </div>
</section>
