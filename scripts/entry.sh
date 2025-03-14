#!/bin/bash
set -e  # Exit on error

# Check if Apache is already running
if pgrep apache2 > /dev/null; then
    echo "Apache is already running."
else
    echo "Starting Apache..."
    service apache2 start
fi


tail -f /dev/null

