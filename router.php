<?php

$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$requestPath = is_string($requestPath) ? rawurldecode($requestPath) : '/';
$requestPath = trim($requestPath, '/');

if (strpos($requestPath, '..') !== false) {
    http_response_code(404);
    exit('Not found');
}

$requestedFile = __DIR__ . DIRECTORY_SEPARATOR
    . str_replace('/', DIRECTORY_SEPARATOR, $requestPath);
if ($requestPath !== '' && is_file($requestedFile)) {
    return false;
}

$routes = [
    '' => 'index.php',
    'about' => 'about.php',
    'services' => 'services.php',
    'faqs' => 'faqs.php',
    'contact' => 'contact.php',
    'privacy' => 'privacy.php',
    'terms' => 'terms.php',
];

if (!isset($routes[$requestPath])) {
    http_response_code(404);
    exit('Not found');
}

require __DIR__ . DIRECTORY_SEPARATOR . $routes[$requestPath];