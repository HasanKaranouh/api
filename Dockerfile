# Use official PHP with Apache
FROM php:8.2-apache

# Install PostgreSQL driver
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo_pgsql

# Copy your app into the container
COPY . /var/www/html

# Optional: enable Apache mod_rewrite
RUN a2enmod rewrite

EXPOSE 10000
