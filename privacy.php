<?php
$pageTitle = 'Privacy & Cookie Policy | PAYE Refund Ireland';
$currentPage = 'privacy';
$breadcrumbTitle = 'Privacy & Cookie Policy';
$sections = [
    ['Contact details', 'ACCTS & TECHS LIMITED (trading as PAYE Refund) is the data controller responsible for your personal data. Contact us with questions or requests about your legal rights.', 'Registered Office: Unit F13, Maynooth Business Campus, Co. Kildare, Ireland · Company Registration No: 494758 · Phone: 045 254 213 · Email: info@payerefund.ie'],
    ['Personal data we collect', 'We may collect identity and contact details, financial and transaction data, technical and usage data, profile information, and marketing and communications preferences, where relevant to our services.'],
    ['Sensitive information and the public form', 'Some tax relief reviews may require special categories of personal data, such as health information, only where strictly necessary to assess a claim. Do not submit PPS numbers, bank details, Revenue login details, or sensitive documents through a public form.'],
    ['Purposes and legal bases', 'We use personal data where necessary to perform a contract, pursue legitimate interests, comply with legal obligations, or with your consent for specific processing such as optional cookies or marketing.'],
    ['Who receives personal data', 'Data may be shared as necessary with the Revenue Commissioners, professional advisers, and service providers acting as processors to provide the requested services and meet our obligations.'],
    ['International transfers', 'Where personal data is transferred outside the European Economic Area, we use appropriate safeguards required by data protection law.'],
    ['Retention', 'We retain personal data only for as long as reasonably necessary for the purposes collected, including legal, regulatory, accounting, and reporting requirements.'],
    ['Security', 'We use appropriate technical and organisational measures to protect personal data. No internet transmission or storage system can be guaranteed completely secure.'],
    ['Your rights', 'Subject to applicable law, you may have rights to access, correct, erase, restrict or object to processing, request portability, or withdraw consent. You may also complain to the Data Protection Commission.'],
    ['Required and optional information', 'Some information is required to provide a requested service or meet legal obligations. Optional information and consent-based technologies are not required to use this website.'],
    ['Automated decisions', 'We do not make decisions with legal or similarly significant effects about you solely by automated means.'],
    ['Cookie choices, Google Analytics and Meta Pixel', 'Strictly necessary cookies support website operation. Analytics or marketing technologies should only be used where you have provided valid consent; you can manage cookie preferences through your browser settings.'],
    ['External links', 'Our website may link to third-party websites. Their privacy practices are governed by their own policies, which we encourage you to review.'],
    ['Changes to this policy', 'We may update this policy from time to time. The latest version will be published on this page with its revision date.'],
];
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/breadcrumb.php';
?>
<main id="main-content">
    <section class="section wrap"><div class="narrow reveal"><span class="eyebrow">Legal &amp; compliance</span><h1>Privacy &amp; Cookie Policy</h1><p class="lead">How PAYE Refund collects, uses, shares and protects personal data, and how optional analytics and marketing technologies are controlled.</p></div></section>
    <section class="section section-tight wrap legal-layout">
        <aside class="legal-toc"><h2>Table of contents</h2><nav aria-label="Policy sections"><?php foreach ($sections as $index => [$title]): ?><a href="#sec-<?= $index + 1 ?>"><?= $index + 1 ?>. <?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></a><?php endforeach; ?></nav></aside>
        <div class="legal-content"><?php foreach ($sections as $index => $section): $title = $section[0]; $body = $section[1]; $extra = $section[2] ?? ''; ?><section id="sec-<?= $index + 1 ?>" class="legal-section reveal"><h2><?= $index + 1 ?>. <?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h2><p><?= htmlspecialchars($body, ENT_QUOTES, 'UTF-8') ?></p><?php if ($extra): ?><p class="notice"><?= htmlspecialchars($extra, ENT_QUOTES, 'UTF-8') ?></p><?php endif; ?></section><?php endforeach; ?></div>
    </section>
</main>
<?php require __DIR__ . '/includes/cta.php'; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>
