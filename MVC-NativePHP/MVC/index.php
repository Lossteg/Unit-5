<?php

require_once __DIR__ . '/autoload.php';

use App\Core\Request;
use App\Core\Router;

$request = new Request();
$router = new Router();

try {
    $router->dispatch($request);
} catch (\Exception $e) {
    http_response_code(500);
    echo "Ошибка: " . $e->getMessage();
}