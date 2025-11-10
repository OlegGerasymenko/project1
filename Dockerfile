FROM php:8.2-apache

# Enable Apache modules
RUN a2enmod rewrite

# Copy the PHP application
COPY index.php /var/www/html/

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose port 80
EXPOSE 80

# Health check
HEALTHCHECK --interval=30s --timeout=3s --start-period=5s \
    --retries=3 CMD curl -f http://localhost/ || exit 1

# Start Apache
CMD ["apache2-foreground"]

