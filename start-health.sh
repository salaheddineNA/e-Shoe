#!/bin/bash

# Start a simple healthcheck server in background
php -S 0.0.0.0:8000 -t public &

# Wait a moment for server to start
sleep 2

# Test if server is responding
echo "Testing health endpoint..."
curl -f http://localhost:8000/health || exit 1

# Keep the script running
wait
