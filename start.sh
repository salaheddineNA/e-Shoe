#!/bin/bash

echo "Starting Laravel application..."
echo "Port: $PORT"
echo "Working directory: $(pwd)"
echo "PHP version: $(php -v)"
echo "Checking if vendor directory exists..."
ls -la vendor/ || echo "Vendor directory missing!"
echo "Checking if .env exists..."
ls -la .env || echo ".env file missing!"
echo "Testing Laravel artisan..."
php artisan --version || echo "Artisan command failed!"
echo "Starting PHP server on port $PORT..."
php -S 0.0.0.0:$PORT -t public
