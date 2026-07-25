# 1. Base Image: PHP 8.3 with FPM (FastCGI Process Manager)
FROM php:8.3-fpm

# 2. Install system dependencies required for PHP extensions and Composer
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# 3. Install PHP extensions required by Laravel and MySQL
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# 4. Copy the latest Composer binary from the official Composer image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 5. Set the working directory inside the container
WORKDIR /var/www/html

# 6. Copy the entire Laravel application source code into the container
COPY . .

# 7. Install PHP dependencies (without dev packages for a lighter and safer build)
RUN composer install --no-interaction --optimize-autoloader --no-dev

# 8. Set proper ownership and permissions for storage and cache directories
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# 9. Configure PHP upload limits for file uploads (e.g., profile photos)
RUN echo "upload_max_filesize = 10M\npost_max_size = 10M" > /usr/local/etc/php/conf.d/uploads.ini

# 10. Expose the internal PHP-FPM port
EXPOSE 9000

CMD ["php-fpm"]
