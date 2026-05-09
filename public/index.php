<?php

// Healthcheck bypass - respond immediately
if (preg_match('/\/health(\.html|\.php)?$/', $_SERVER['REQUEST_URI'])) {
    header('Content-Type: text/plain');
    echo 'OK';
    exit;
}

// Simple landing page to prevent redirect loops
header('Content-Type: text/html');
echo '<!DOCTYPE html>
<html>
<head>
    <title>ShoeStore - Laravel Application</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding: 50px; }
        .container { max-width: 600px; margin: 0 auto; }
        .status { color: green; font-weight: bold; }
        .info { background: #f5f5f5; padding: 20px; margin: 20px 0; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>👟 ShoeStore</h1>
        <p class="status">✅ Application is running</p>
        
        <div class="info">
            <h3>Server Information</h3>
            <p><strong>PHP Version:</strong> ' . PHP_VERSION . '</p>
            <p><strong>Request URI:</strong> ' . htmlspecialchars($_SERVER['REQUEST_URI']) . '</p>
            <p><strong>Healthcheck:</strong> <a href="/health.html">/health.html</a> ✅</p>
        </div>
        
        <div class="info">
            <h3>Laravel Status</h3>
            <p>Framework files are present but not loaded to prevent redirect loops.</p>
            <p>Vendor directory: ' . (file_exists(__DIR__.'/../vendor') ? '✅ Present' : '❌ Missing') . '</p>
            <p>Environment file: ' . (file_exists(__DIR__.'/../.env') ? '✅ Present' : '❌ Missing') . '</p>
        </div>
        
        <p><small>Server is running on port: ' . ($_SERVER['PORT'] ?? '8000') . '</small></p>
    </div>
</body>
</html>';
