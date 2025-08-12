<?php
declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

$uriPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$normalizedPath = '/' . trim($uriPath, '/');
if ($normalizedPath === '//') {
    $normalizedPath = '/';
}

$routes = [
    '/' => 'home',
    '/about' => 'about',
    '/contact' => 'contact',
];

$viewName = $routes[$normalizedPath] ?? null;
if ($viewName === null) {
    http_response_code(404);
    $viewName = '404';
}

$viewsDir = __DIR__ . '/../app/views';
$layoutFile = $viewsDir . '/layout.php';
$contentFile = $viewsDir . '/' . $viewName . '.php';

if (!is_file($contentFile)) {
    http_response_code(404);
    $contentFile = $viewsDir . '/404.php';
}

$title = ucfirst($viewName);
$baseUrl = rtrim((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? 'localhost'), '/');

require $layoutFile;