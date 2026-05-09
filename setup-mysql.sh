#!/bin/bash

echo "Setting up MySQL database for ShoeStore..."

# Check if MySQL is running
if ! pgrep -x "mysqld" > /dev/null; then
    echo "MySQL is not running. Please start MySQL service first."
    echo "On Ubuntu/Debian: sudo systemctl start mysql"
    echo "On macOS: brew services start mysql"
    echo "On Windows: net start mysql"
    exit 1
fi

# Create database if it doesn't exist
echo "Creating database 'shoestore'..."
mysql -u root -e "CREATE DATABASE IF NOT EXISTS shoestore CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;" || {
    echo "Failed to create database. Please check MySQL credentials."
    exit 1
}

echo "Database 'shoestore' created successfully!"

# Run Laravel migrations
echo "Running Laravel migrations..."
php artisan migrate

# Seed the database
echo "Seeding database..."
php artisan db:seed

echo "MySQL database setup completed!"
echo "Database: shoestore"
echo "Admin credentials:"
echo "Email: admin@shoestore.com"
echo "Password: admin123"
