# Use the official PHP image with Apache
FROM php:8.0-apache

# Copy the content of your project to the container's web root
COPY . /var/www/html/

# Expose the port Render assigns dynamically
EXPOSE 80

# Run PHP's built-in server
CMD ["apache2-foreground"]
