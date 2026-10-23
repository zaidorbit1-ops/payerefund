<?php

use PHPMailer\PHPMailer\Exception as MailerException;
use PHPMailer\PHPMailer\PHPMailer;

function sendContactEnquiry(array $formValues, array $confirmations, string $reference): bool
{
    $configPath = __DIR__ . '/../config/smtp.php';
    $mailerPath = __DIR__ . '/../PHPMailer-master/src';

    try {
        if (!is_file($configPath)) {
            throw new RuntimeException('SMTP configuration file is missing.');
        }
        if (!is_file($mailerPath . '/PHPMailer.php') || !is_file($mailerPath . '/SMTP.php') || !is_file($mailerPath . '/Exception.php')) {
            throw new RuntimeException('PHPMailer source files are missing.');
        }

        $config = require $configPath;
        if (!is_array($config) || empty($config['enabled'])) {
            throw new RuntimeException('SMTP is not enabled in config/smtp.php.');
        }

        foreach (['host', 'username', 'password', 'from_email', 'from_name'] as $key) {
            if (!isset($config[$key]) || !is_string($config[$key]) || trim($config[$key]) === '' || strpos($config[$key], 'REPLACE_WITH_') !== false) {
                throw new RuntimeException('SMTP configuration is incomplete: ' . $key . '.');
            }
        }
        if (!isset($config['to_emails']) || !is_array($config['to_emails']) || count($config['to_emails']) < 1) {
            throw new RuntimeException('SMTP configuration must contain at least one recipient email address.');
        }
        foreach ($config['to_emails'] as $recipient) {
            if (!is_string($recipient) || strpos($recipient, 'REPLACE_WITH_') !== false || !filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
                throw new RuntimeException('SMTP configuration contains an invalid recipient email address.');
            }
        }
        if (empty($config['port']) || !is_numeric($config['port']) || (int) $config['port'] < 1) {
            throw new RuntimeException('SMTP configuration has an invalid port.');
        }
        if (!in_array($config['encryption'] ?? '', ['ssl', 'tls'], true)) {
            throw new RuntimeException('SMTP encryption must be ssl or tls.');
        }
        if (!filter_var($config['from_email'], FILTER_VALIDATE_EMAIL)) {
            throw new RuntimeException('SMTP sender email address is invalid.');
        }

        require_once $mailerPath . '/Exception.php';
        require_once $mailerPath . '/PHPMailer.php';
        require_once $mailerPath . '/SMTP.php';

        $escape = static function (string $value): string {
            return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        };
        $taxYears = $formValues['tax_years'] !== '' ? $formValues['tax_years'] : 'Not provided';
        $message = $formValues['message'];
        $submittedAt = date('j F Y, H:i T');

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = $config['host'];
        $mail->SMTPAuth = true;
        $mail->Username = $config['username'];
        $mail->Password = $config['password'];
        $mail->Port = (int) $config['port'];
        $mail->SMTPSecure = $config['encryption'] === 'ssl'
            ? PHPMailer::ENCRYPTION_SMTPS
            : PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Timeout = 20;
        $mail->CharSet = PHPMailer::CHARSET_UTF8;
        $mail->setFrom($config['from_email'], $config['from_name']);
        foreach ($config['to_emails'] as $recipient) {
            $mail->addAddress($recipient);
        }
        $mail->addReplyTo($formValues['email'], $formValues['name']);
        $mail->isHTML(true);
        $mail->Subject = 'New PAYE Refund enquiry ' . $reference;

        $rows = [
            'Full name' => $formValues['name'],
            'Email address' => $formValues['email'],
            'Phone number' => $formValues['phone'],
            'Location' => $formValues['location'],
            'Tax years' => $taxYears,
            'Possible claim area' => $formValues['claim_area'],
            'Accuracy and privacy confirmation' => $confirmations['accurate'] ? 'Confirmed' : 'Not confirmed',
            'Revenue final assessment confirmation' => $confirmations['outcome'] ? 'Confirmed' : 'Not confirmed',
        ];
        $htmlRows = '';
        $textRows = '';
        foreach ($rows as $label => $value) {
            $htmlRows .= '<tr>'
                . '<th align="left" valign="top" style="width:36%;padding:13px 15px;border-bottom:1px solid #e5ebef;color:#526575;font-size:13px;font-weight:600;">' . $escape($label) . '</th>'
                . '<td valign="top" style="padding:13px 15px;border-bottom:1px solid #e5ebef;color:#102b40;font-size:14px;line-height:1.6;">' . $escape($value) . '</td>'
                . '</tr>';
            $textRows .= $label . ': ' . $value . "\n";
        }

        $mail->Body = '<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width"></head>'
            . '<body style="margin:0;padding:28px 12px;background:#f1f5f7;font-family:Arial,Helvetica,sans-serif;color:#102b40;">'
            . '<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width:720px;margin:0 auto;background:#ffffff;border:1px solid #dce5e9;border-radius:14px;overflow:hidden;">'
            . '<tr><td style="padding:28px 32px;background:#0b2538;border-bottom:4px solid #0d7b7c;">'
            . '<p style="margin:0 0 8px;color:#86d8d0;font-size:11px;font-weight:bold;letter-spacing:2px;text-transform:uppercase;">PAYE Refund · Website enquiry</p>'
            . '<h1 style="margin:0;color:#ffffff;font-size:26px;line-height:1.25;">New refund check enquiry</h1>'
            . '<p style="margin:12px 0 0;color:#d4e0e6;font-size:13px;">Reference <strong style="color:#ffffff;">' . $escape($reference) . '</strong></p>'
            . '</td></tr><tr><td style="padding:26px 32px 10px;">'
            . '<p style="margin:0 0 18px;color:#526575;font-size:14px;line-height:1.65;">A prospective client submitted the PAYE Refund contact form. Their details are below.</p>'
            . '<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="border:1px solid #e5ebef;border-radius:9px;border-spacing:0;overflow:hidden;">'
            . $htmlRows
            . '</table><h2 style="margin:25px 0 10px;color:#102b40;font-size:16px;">Brief details</h2>'
            . '<div style="padding:16px;background:#f5f8f9;border-left:3px solid #0d7b7c;border-radius:4px;color:#304857;font-size:14px;line-height:1.7;white-space:pre-wrap;">' . nl2br($escape($message), false) . '</div>'
            . '<p style="margin:22px 0 0;color:#71808a;font-size:12px;line-height:1.6;">Submitted ' . $escape($submittedAt) . '. Do not request PPS numbers, bank details or Revenue login credentials by replying to this enquiry.</p>'
            . '</td></tr><tr><td style="padding:18px 32px;background:#f7f9fa;border-top:1px solid #e5ebef;color:#71808a;font-size:11px;line-height:1.6;">ACCTS &amp; TECHS LIMITED · PAYE Refund<br>Unit F13, Maynooth Business Campus, Co. Kildare, Ireland</td></tr>'
            . '</table></body></html>';
        $mail->AltBody = "PAYE Refund website enquiry\nReference: {$reference}\nSubmitted: {$submittedAt}\n\n"
            . $textRows . "\nBrief details:\n{$message}\n";

        $mail->send();
        return true;
    } catch (MailerException $exception) {
        error_log('PAYE Refund contact email failed: ' . $exception->getMessage());
        return false;
    } catch (RuntimeException $exception) {
        error_log('PAYE Refund contact email is not configured: ' . $exception->getMessage());
        return false;
    }
}
