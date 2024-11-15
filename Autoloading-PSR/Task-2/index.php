<?php

require __DIR__ . '/autoload.php';

use Psr\Log\Channels\ConsoleChannel;
use Psr\Log\Logger;
use Psr\Log\Channels\FileChannel;
use Psr\Log\Templates\LogTemplateEngine;

$template = new LogTemplateEngine();
$logger = new Logger($template);

$logger->addChannel(new ConsoleChannel());
$logger->addChannel(new FileChannel('C:\INNOWISE\Unit-5\Autoloading-PSR\Task-2\Logs.txt'));

$logger->info("Application started");

$logger->error("Database connection failed", [
    '_template' => 'error',
    'code' => 'DB001'
]);

$logger->info("Logged in", [
    '_template' => 'user',
    'username' => 'john_doe'
]);

$logger->setTemplate('api', '{{ time }} API call: {{ endpoint }} (Status: {{ status }})');

$logger->info("GET /users", [
    '_template' => 'api',
    'endpoint' => '/users',
    'status' => 200
]);