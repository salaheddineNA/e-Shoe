<?php

// Healthcheck bypass - respond immediately without loading Laravel
if ($_SERVER['REQUEST_URI'] === '/health' || $_SERVER['REQUEST_URI'] === '/health.php' || $_SERVER['REQUEST_URI'] === '/health-check.php') {
    error_log("Healthcheck accessed via bypass: " . $_SERVER['REQUEST_URI']);
    header('Content-Type: text/plain');
    echo 'OK';
    exit;
}

error_log("Starting Laravel bootstrap for: " . $_SERVER['REQUEST_URI']);

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Log basic environment info
error_log("PHP Version: " . PHP_VERSION);
error_log("Working Directory: " . getcwd());
error_log("Document Root: " . __DIR__);
error_log("Vendor directory exists: " . (file_exists(__DIR__.'/../vendor') ? 'YES' : 'NO'));
error_log(".env file exists: " . (file_exists(__DIR__.'/../.env') ? 'YES' : 'NO'));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
