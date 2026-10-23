<?php
$pageTitle = 'Contact | PAYE Refund Ireland';
$currentPage = 'contact';
$breadcrumbTitle = 'Contact';
$formStatus = '';
$formStatusType = '';
$formValues = [
    'name' => '',
    'email' => '',
    'phone' => '',
    'location' => 'Ireland',
    'tax_years' => '',
    'claim_area' => 'Not sure',
    'message' => '',
];
$confirmations = ['accurate' => false, 'outcome' => false];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($formValues as $field => $value) {
        if (isset($_POST[$field]) && is_string($_POST[$field])) {
            $formValues[$field] = trim($_POST[$field]);
        }
    }
    foreach ($confirmations as $field => $value) {
        $confirmations[$field] = isset($_POST[$field]) && $_POST[$field] === '1';
    }

    $errors = [];
    if ($formValues['name'] === '' || strlen($formValues['name']) > 200 || preg_match('/[\r\n]/', $formValues['name'])) {
        $errors[] = 'Enter your full name (up to 200 characters).';
    }
    if (!filter_var($formValues['email'], FILTER_VALIDATE_EMAIL) || strlen($formValues['email']) > 254) {
        $errors[] = 'Enter a valid email address.';
    }
    if ($formValues['phone'] === '' || strlen($formValues['phone']) > 40) {
        $errors[] = 'Enter your phone number (up to 40 characters).';
    }
    if (!in_array($formValues['location'], ['Ireland', 'Outside Ireland'], true)) {
        $errors[] = 'Select where you are based.';
    }
    if (strlen($formValues['tax_years']) > 100) {
        $errors[] = 'Tax years must be 100 characters or fewer.';
    }
    if (!in_array($formValues['claim_area'], ['Not sure', 'Medical or dental expenses', 'Rent Tax Credit', 'Remote working', 'Tuition fees', 'Flat-rate expenses', 'Emergency tax or job change', 'Other'], true)) {
        $errors[] = 'Select a possible claim area.';
    }
    if ($formValues['message'] === '' || strlen($formValues['message']) > 5000) {
        $errors[] = 'Enter brief details (up to 5,000 characters).';
    }
    if (!$confirmations['accurate']) {
        $errors[] = 'Please confirm that your information is accurate and read the Privacy & Cookie Policy.';
    }
    if (!$confirmations['outcome']) {
        $errors[] = 'Please confirm that Revenue makes the final assessment.';
    }

    if ($errors) {
        $formStatus = implode(' ', $errors);
        $formStatusType = 'error';
    } else {
        require_once __DIR__ . '/includes/contact-email.php';
        $reference = 'PR-' . date('Ymd') . '-' . strtoupper(bin2hex(random_bytes(3)));

        if (sendContactEnquiry($formValues, $confirmations, $reference)) {
            $formStatus = 'Thank you. Your enquiry has been sent; our team will be in touch.';
            $formStatusType = 'success';
            $formValues = [
                'name' => '',
                'email' => '',
                'phone' => '',
                'location' => 'Ireland',
                'tax_years' => '',
                'claim_area' => 'Not sure',
                'message' => '',
            ];
            $confirmations = ['accurate' => false, 'outcome' => false];
        } else {
            $formStatus = 'We could not send your enquiry right now. Please email info@payerefund.ie or call 045 254 213.';
            $formStatusType = 'error';
        }
    }
}

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/breadcrumb.php';
?>
<main id="main-content">
    <section class="section wrap"><div class="narrow reveal"><span class="eyebrow">We’re here to help</span><h1>Contact PAYE Refund</h1><p class="lead">Get in touch with ACCTS &amp; TECHS LIMITED for information about a PAYE review. Please do not send PPS numbers, bank details, Revenue login details, or sensitive documents through email or this website.</p></div></section>
    <section class="section section-tight wrap contact-layout" id="contact-details">
        <form class="contact-form reveal" method="post" action="contact#contact-form" id="contact-form">
                <div class="contact-form-heading form-field-full">
                    <span class="eyebrow">PAYE refund enquiry</span>
                    <h2>Start My Refund Check</h2>
                    <p>Fields marked <strong>*</strong> are required. This form is not a secure document-upload channel.</p>
                </div>
                <?php if ($formStatus !== ''): ?>
                    <p class="form-message form-message-<?= htmlspecialchars($formStatusType, ENT_QUOTES, 'UTF-8') ?>" role="<?= $formStatusType === 'error' ? 'alert' : 'status' ?>"><?= htmlspecialchars($formStatus, ENT_QUOTES, 'UTF-8') ?></p>
                <?php endif; ?>
                <div class="form-field">
                    <label for="contact-name">Full name <span class="required-marker">*</span></label>
                    <input id="contact-name" name="name" type="text" autocomplete="name" maxlength="200" required value="<?= htmlspecialchars($formValues['name'], ENT_QUOTES, 'UTF-8') ?>">
                </div>
                <div class="form-field">
                    <label for="contact-email">Email address <span class="required-marker">*</span></label>
                    <input id="contact-email" name="email" type="email" autocomplete="email" maxlength="254" required value="<?= htmlspecialchars($formValues['email'], ENT_QUOTES, 'UTF-8') ?>">
                </div>
                <div class="form-field">
                    <label for="contact-phone">Phone number <span class="required-marker">*</span></label>
                    <input id="contact-phone" name="phone" type="tel" autocomplete="tel" maxlength="40" required value="<?= htmlspecialchars($formValues['phone'], ENT_QUOTES, 'UTF-8') ?>">
                </div>
                <div class="form-field">
                    <label for="contact-location">Where are you based?</label>
                    <select id="contact-location" name="location" required>
                        <?php foreach (['Ireland', 'Outside Ireland'] as $location): ?>
                            <option value="<?= htmlspecialchars($location, ENT_QUOTES, 'UTF-8') ?>"<?= $formValues['location'] === $location ? ' selected' : '' ?>><?= htmlspecialchars($location, ENT_QUOTES, 'UTF-8') ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-field">
                    <label for="contact-tax-years">Tax years</label>
                    <input id="contact-tax-years" name="tax_years" type="text" maxlength="100" placeholder="e.g. 2022–2025" value="<?= htmlspecialchars($formValues['tax_years'], ENT_QUOTES, 'UTF-8') ?>">
                </div>
                <div class="form-field">
                    <label for="contact-claim-area">Possible claim area</label>
                    <select id="contact-claim-area" name="claim_area" required>
                        <?php foreach (['Not sure', 'Medical or dental expenses', 'Rent Tax Credit', 'Remote working', 'Tuition fees', 'Flat-rate expenses', 'Emergency tax or job change', 'Other'] as $area): ?>
                            <option value="<?= htmlspecialchars($area, ENT_QUOTES, 'UTF-8') ?>"<?= $formValues['claim_area'] === $area ? ' selected' : '' ?>><?= htmlspecialchars($area, ENT_QUOTES, 'UTF-8') ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-field form-field-full">
                    <label for="contact-message">Brief details <span class="required-marker">*</span></label>
                    <textarea id="contact-message" name="message" rows="5" maxlength="5000" placeholder="Please do not include your PPS number, bank details or sensitive documents." required><?= htmlspecialchars($formValues['message'], ENT_QUOTES, 'UTF-8') ?></textarea>
                </div>
                <label class="form-consent form-field-full">
                    <input type="checkbox" name="accurate" value="1" required<?= $confirmations['accurate'] ? ' checked' : '' ?>>
                    <span>I confirm that the information provided is accurate to the best of my knowledge and I have read the <a href="privacy">Privacy &amp; Cookie Policy</a>.</span>
                </label>
                <label class="form-consent form-field-full">
                    <input type="checkbox" name="outcome" value="1" required<?= $confirmations['outcome'] ? ' checked' : '' ?>>
                    <span>I understand that a review may identify a refund, no change or an underpayment, and that Revenue makes the final assessment.</span>
                </label>
                <p class="form-privacy form-field-full">Never send your PPS number, bank details, Revenue login details, or supporting documents through this form.</p>
                <button class="button button-gold form-field-full" type="submit">Submit refund check <span class="material-symbols-outlined" aria-hidden="true">arrow_forward</span></button>
        </form>
        <aside class="contact-sidebar">
            <div class="contact-card reveal">
                <span class="icon-tile material-symbols-outlined" aria-hidden="true">support_agent</span>
                <h2>Speak with our team</h2>
                <p>We can explain the review process, service scope, and fee before you decide how to proceed.</p>
                <p><strong>Phone</strong><br><a href="tel:+35345254213">045 254 213</a></p>
                <p><strong>Email</strong><br><a href="mailto:info@payerefund.ie">info@payerefund.ie</a></p>
            </div>
            <div class="contact-card reveal">
                <span class="icon-tile material-symbols-outlined" aria-hidden="true">location_on</span>
                <h2>Registered office</h2>
                <p>ACCTS &amp; TECHS LIMITED<br>Unit F13, Maynooth Business Campus<br>Co. Kildare, Ireland</p>
                <p><strong>Company number:</strong> 494758</p>
                <p>Independent private tax advisory service. Not affiliated with the Revenue Commissioners.</p>
            </div>
        </aside>
    </section>
</main>
<?php require __DIR__ . '/includes/cta.php'; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>
