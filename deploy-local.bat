@echo off
echo Starting Laravel ShoeStore locally...

REM Set permissions
php artisan storage:link
php artisan key:generate

REM Create database
if not exist "database.sqlite" (
    echo. > database.sqlite
)

REM Run migrations
php artisan migrate

REM Create admin
php artisan db:seed --class=AdminSeeder

REM Start server
echo Starting server on http://localhost:8000
php artisan serve --host=0.0.0.0 --port=8000

pause
