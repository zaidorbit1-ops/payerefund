<?php
$pageTitle = 'Terms of Business | PAYE Refund Ireland';
$currentPage = 'terms';
$breadcrumbTitle = 'Terms of Business';
$terms = [
    ['Private independent service', 'PAYE Refund Ireland is a trading name of ACCTS & TECHS LIMITED, acting as an independent private tax agent. We provide professional assistance to PAYE workers in identifying and claiming legitimate tax credits and reliefs.'],
    ['Website information', 'Website content is for general informational purposes only and does not constitute formal financial or legal advice. Tax laws and Revenue practices may change.'],
    ['Service scope', 'Our service includes reviewing relevant past tax years, identifying possible reliefs, and submitting formal review requests to Revenue on your behalf where instructed and authorised.'],
    ['Fee (€150 + VAT)', 'Our standard fee is €150 plus VAT per person, per year. It is payable only where the Revenue Commissioners issue a tax refund resulting from our review.'],
    ['No refund outcome', 'If Revenue determines that no overpayment has been made or no additional credits are due, no fee is charged.'],
    ['Outcomes and timing', 'Processing times depend on Revenue and its verification procedures. We cannot guarantee a turnaround time or exact refund amount before the review is complete.'],
    ['Refund destination', 'Revenue pays refunds directly into the customer’s verified bank account on file with Revenue. Our fee is subsequently invoiced and settled separately.'],
    ['Authorisation and login security', 'We use official Revenue authorisations or guided procedures. You must never share your myAccount password or login credentials with anyone.'],
    ['Customer responsibilities', 'You are responsible for ensuring that information, receipts, and personal data provided are accurate and complete, and for cooperating with reasonable requests for supporting documents.'],
    ['Four-year time limit', 'Claims for tax refunds are subject to statutory time limits, generally four years after the relevant tax year. Please review older entitlements promptly.'],
    ['Data protection and communications', 'We process personal data in accordance with applicable data protection law. Information is used for tax review purposes and communicating updates about your claim.'],
    ['Liability and mandatory rights', 'Nothing in these terms excludes statutory consumer rights or protections under Irish law.'],
    ['Changes and engagement terms', 'We may update these terms. The latest version will be published on our website.'],
    ['Contact', 'For queries regarding these terms or our services, call 045 254 213 or email info@payerefund.ie.'],
];
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/breadcrumb.php';
?>
<main id="main-content">
    <section class="section wrap narrow"><div class="reveal"><span class="eyebrow">Important information</span><h1>Terms of Business and Website Use</h1><p class="lead">Please read these terms carefully before engaging our services or using our website.</p></div></section>
    <section class="section section-tight wrap narrow">
        <div class="notice reveal"><h2>Introduction &amp; important information</h2><p>Welcome to PAYE Refund Ireland, operated by ACCTS &amp; TECHS LIMITED. These terms set out the basis on which we provide tax review and refund advisory services.</p><p><strong>Revenue independence:</strong> We are a private, independent tax advisory firm and are not affiliated with, endorsed by, or connected to the Revenue Commissioners. You can manage your tax affairs directly through Revenue’s myAccount service.</p><p>Our fee is €150 + VAT per person, per year, payable only where Revenue issues a refund.</p></div>
        <div class="terms-list"><?php foreach ($terms as $index => [$title, $body]): ?><article class="legal-section reveal"><h2><?= $index + 1 ?>. <?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h2><p><?= htmlspecialchars($body, ENT_QUOTES, 'UTF-8') ?></p></article><?php endforeach; ?></div>
    </section>
</main>
<?php require __DIR__ . '/includes/cta.php'; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>
