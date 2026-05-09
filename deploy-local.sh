#!/bin/bash

echo "Starting Laravel ShoeStore locally..."

# Create storage link
php artisan storage:link

# Generate key
php artisan key:generate

# Create database
touch database/database.sqlite

# Run migrations
php artisan migrate

# Create admin
php artisan db:seed --class=AdminSeeder

# Start server
echo "Starting server on http://localhost:8000"
php artisan serve --host=0.0.0.0 --port=8000
