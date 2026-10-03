FROM php:8.2-apache

# Install required PHP extensions for CodeIgniter 4
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-configure intl \
    && docker-php-ext-install gd intl mysqli pdo pdo_mysql zip

# Enable Apache mod_rewrite for CI4 routing
RUN a2enmod rewrite

# Set Apache Document Root to /public directory
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/conf-available/*.conf

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Install Composer dependencies
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Set permissions for writable directory
RUN mkdir -p /var/www/html/public/uploads \
    && chown -R www-data:www-data /var/www/html/writable /var/www/html/public/uploads

# Expose port
EXPOSE 80