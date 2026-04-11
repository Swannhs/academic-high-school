FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libicu-dev \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install intl gd zip mysqli pdo_mysql \
    && git config --global --add safe.directory /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy source code
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions for CodeIgniter
RUN mkdir -p /var/www/html/writable /var/www/html/public/uploads \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 777 /var/www/html/writable \
    && chmod -R 777 /var/www/html/public/uploads

# Configure Apache: enable mod_rewrite, set DocumentRoot to public/
RUN a2enmod rewrite \
    && printf '<VirtualHost *:80>\n\
    DocumentRoot /var/www/html/public\n\
    <Directory /var/www/html/public>\n\
        Options -Indexes +FollowSymLinks\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
    ErrorLog ${APACHE_LOG_DIR}/error.log\n\
    CustomLog ${APACHE_LOG_DIR}/access.log combined\n\
</VirtualHost>\n' > /etc/apache2/sites-available/000-default.conf

EXPOSE 80

CMD ["apache2-foreground"]
