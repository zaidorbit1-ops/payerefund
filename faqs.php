<?php
$pageTitle = 'Frequently Asked Questions | PAYE Refund Ireland';
$currentPage = 'faqs';
$breadcrumbTitle = 'FAQs';
$faqs = [
    ['How many years can generally be reviewed?', 'Tax reviews can generally be conducted for the last four open tax years. It is vital to submit claims before statutory deadlines pass.'],
    ['What is the service fee?', '€150 + VAT per person, per year, payable only where Revenue issues a refund. There are no upfront charges; the fee is contingent upon a successful outcome.'],
    ['What if the Revenue refund is less than the fee?', 'The fixed fee can be greater than a low-value refund. We will advise you before proceeding so you can make an informed decision.'],
    ['Who receives my refund?', 'Revenue pays approved refunds directly into your personal nominated bank account. Our fee is invoiced separately.'],
    ['Can I complete the return myself?', 'Yes. Every taxpayer can submit their own Form 12 or review their tax record through the official Revenue myAccount portal without professional assistance.'],
    ['Could a review find an underpayment?', 'Yes. Reviewing previous years may identify a refund, no change, or an underpayment. No outcome can be guaranteed before a full review.'],
    ['Do I need receipts?', 'Supporting records may be required for expense-based claims. Retain medical receipts, tuition fee statements, and other relevant documents as Revenue may request verification.'],
    ['How should I send documents?', 'Do not send sensitive documents through a public form. Once an initial enquiry is registered, we will explain appropriate secure methods for sharing records.'],
    ['Will you ask for my Revenue password?', 'No. Never share your myAccount or ROS password. We use authorised agent linkage and secure client communication channels.'],
    ['Can I claim after leaving Ireland?', 'Eligibility depends on your circumstances and the relevant tax years. Contact us for an initial discussion; Revenue makes the final decision.'],
    ['How long does a refund take?', 'Processing times depend entirely on Revenue and its verification procedures. We cannot guarantee a specific turnaround time.'],
    ['Are you part of the Revenue Commissioners?', 'No. PAYE Refund is an independent private tax advisory service provided by ACCTS & TECHS LIMITED. You may also manage your tax affairs directly through Revenue.'],
];
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/breadcrumb.php';
?>
<main id="main-content">
    <section class="section wrap narrow"><div class="reveal"><span class="eyebrow">Answers and guidance</span><h1>Frequently asked questions</h1><p class="lead">Get clear answers about our professional fees, refund timelines, data security, our independent status relative to Revenue, and the PAYE tax review process.</p></div></section>
    <section class="section section-tight wrap narrow">
        <div class="faq-list">
            <?php foreach ($faqs as $index => [$question, $answer]): $id = 'faq-' . ($index + 1); ?>
                <article class="faq-item reveal">
                    <h2><button class="faq-question" type="button" aria-expanded="false" aria-controls="<?= $id ?>"><span><?= htmlspecialchars($question, ENT_QUOTES, 'UTF-8') ?></span><span class="material-symbols-outlined" aria-hidden="true">expand_more</span></button></h2>
                    <div class="faq-answer" id="<?= $id ?>" hidden><p><?= htmlspecialchars($answer, ENT_QUOTES, 'UTF-8') ?></p></div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</main>
<?php require __DIR__ . '/includes/cta.php'; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>
