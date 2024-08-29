# Use the official PHP image with Apache
FROM php:8.2-apache

# Install system dependencies and Node.js 20
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libsqlite3-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    curl \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_sqlite gd zip

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy the current directory contents into the container
COPY . /var/www/html

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install PHP dependencies
RUN composer install --no-scripts --no-interaction --prefer-dist

# Install Node.js dependencies
RUN npm install

# Build assets using Vite
RUN npm run build

# Set up file permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Expose port 80
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]
