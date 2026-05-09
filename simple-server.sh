#!/bin/bash

echo "=== Starting Simple PHP Server ==="
echo "Port: $PORT"
echo "Working directory: $(pwd)"

# Start the simplest possible PHP server
echo "Starting PHP built-in server..."
exec php -S 0.0.0.0:$PORT -t public
