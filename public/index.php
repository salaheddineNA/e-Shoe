<?php

// Healthcheck bypass - respond immediately without loading Laravel
if ($_SERVER['REQUEST_URI'] === '/health' || $_SERVER['REQUEST_URI'] === '/health.php' || $_SERVER['REQUEST_URI'] === '/health-check.php') {
    header('Content-Type: text/plain');
    echo 'OK';
    exit;
}

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

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
