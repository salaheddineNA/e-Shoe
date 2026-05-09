#!/bin/bash

echo "=== Laravel Application Startup Debug ==="
echo "Working directory: $(pwd)"
echo "Port: $PORT"
echo "PHP version: $(php -v)"

# Check if .env exists and create it if needed
if [ ! -f .env ]; then
    echo "Creating .env file from .env.example..."
    cp .env.example .env
fi

# Generate app key if missing
echo "Checking application key..."
if ! grep -q "APP_KEY=base64" .env; then
    echo "Generating application key..."
    php artisan key:generate --force
fi

# Create database directory and file
echo "Setting up database..."
mkdir -p /tmp
mkdir -p database
touch database/database.sqlite
touch /tmp/database.sqlite

# Update .env with Railway database path
echo "Configuring database for Railway..."
sed -i 's|DB_DATABASE=database/database.sqlite|DB_DATABASE=/tmp/database.sqlite|' .env

# Check vendor directory
echo "Checking dependencies..."
if [ ! -d vendor ]; then
    echo "Installing Composer dependencies..."
    composer install --no-dev --optimize-autoloader
fi

# Check Laravel basics
echo "Testing Laravel installation..."
php artisan --version || { echo "Laravel artisan failed!"; exit 1; }

# Run database migrations
echo "Running database migrations..."
php artisan migrate --force || echo "Migration failed, continuing..."

# Clear caches
echo "Clearing caches..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear

# Create storage links
echo "Creating storage links..."
php artisan storage:link

# Set permissions
echo "Setting permissions..."
chmod -R 775 storage bootstrap/cache

# Test Laravel routes
echo "Testing Laravel routes..."
php artisan route:list || echo "Route list failed, continuing..."

echo "=== Starting PHP Server ==="
echo "Server will start on port: $PORT"
echo "Healthcheck available at: /health"

# Start PHP server with proper error reporting
php -S 0.0.0.0:$PORT -t public 2>&1 | while read line; do
    echo "[PHP] $line"
done
