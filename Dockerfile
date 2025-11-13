FROM php:8.2-apache

# Install additional packages
RUN apt-get update && apt-get install -y \
    nano \
    sudo \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Enable Apache modules
RUN a2enmod rewrite

# Copy the PHP application
COPY index.php /var/www/html/
COPY source/* /var/www/html/source/

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && mkdir -p /app/source \
    && chown -R www-data:www-data /app/source \
    && chmod -R 755 /app/source

# Expose port 80
EXPOSE 80

# Health check
HEALTHCHECK --interval=30s --timeout=3s --start-period=5s \
    --retries=3 CMD curl -f http://localhost/ || exit 1

# Start Apache
CMD ["apache2-foreground"]

