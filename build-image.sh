#!/bin/bash
set -e

echo "🐳 Building PHP application Docker image..."

# Use minikube's docker daemon
eval $(minikube docker-env)

# Build the image
docker build -t php-app:latest .

echo ""
echo "✅ Image built successfully!"
echo "Image: php-app:latest"
echo ""
echo "To verify the image, run:"
echo "docker images | grep php-app"

